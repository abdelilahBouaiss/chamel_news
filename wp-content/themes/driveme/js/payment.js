(function ($) {

    "use strict";

    function dmAlert(message, title) {

        if (typeof bootbox === undefined)
            return alert(message);

        message = '<p>' + message + '</p>';
        if (title)
            message = '<h4>' + title + '</h4>' + message;

        bootbox.alert(message);
    }

    if (typeof drivemepayment == undefined) {
        dmAlert('Payment Configuration Error');
        return;
    }

    Stripe.setPublishableKey(drivemepayment.stripe_pk);

    var pluginName = 'DriveMePayment';

    $[pluginName] = function (form, options) {

        var defaults = { wrap: $(), info: $() };
        var self = this;

        self.options = $.extend(true, {}, defaults, options);
        self.form = $(form);
        self.type = self.form.data('form-type');

        self.form.on('submit', function (e) {
            e.preventDefault();
            e.returnValue = false;
            self.submit();
        });

        self.options.info.find(':input').on('change keypress', function() {
            var $el = $(this);
            $el.removeClass('input-error');
            $el.siblings('.field-error').html('').hide();
        });

        self.unlock();

        return this;
    };

    $[pluginName].prototype = {

        how2submit: {
            stripe: 'ajax',
            offline: 'ajax',
            paypal: 'submit'
        },

        submit: function () {
            var self = this;

            self.lock();

            self.check(function () {

                if (typeof self.aftersubmit[self.type] == 'function')
                    self.aftersubmit[self.type].apply(self);
                else
                    self.dosuccess();

            });

        },

        dosuccess: function () {

            var self = this;

            if (self.how2submit[self.type] !== 'ajax') {

                self.form.off('submit');
                self.form.submit();

            } else {

                var success = false;

                var data = self.form.serialize();
                data += '&security='+drivemepayment.security + '&action=payment_do_' + self.type;

                $.ajax({
                    type: 'post',
                    url: drivemepayment.ajaxurl,
                    data: data,
                    dataType: 'json',
                    success: function (response) {

                        if (response.reload) {
                            success = true;
                            window.location.href = response.reload;
                        } else
                            dmAlert(response.error ? response.error : drivemepayment.locale_error_unknown, drivemepayment.locale_error);
                    },
                    error: function (request, status, error) {
                        dmAlert(error, drivemepayment.locale_error);
                    }
                }).always(function () {
                    if (!success)
                        self.unlock();
                });
            }
        },

        aftersubmit: {

            stripe: function () {

                var self = this;

                function stripeResponseHandler(status, response) {

                    if (response.error) {
                        self.unlock();
                        dmAlert(typeof drivemepayment['stripe_' + response.error.type] != undefined ? drivemepayment['stripe_' + response.error.type] : response.error.message, drivemepayment.locale_error);
                    } else {
                        self.form.find('input[name="stripeToken"]').val(response['id']);
                        self.dosuccess();
                    }
                }

                try {

                    Stripe.createToken({
                        number: self.form.find('.stripe-number').val(),
                        cvc: self.form.find('.stripe-cvc').val(),
                        exp_month: self.form.find('.stripe-expiry-month').val(),
                        exp_year: self.form.find('.stripe-expiry-year').val()
                    }, stripeResponseHandler);

                } catch (e) {
                    self.unlock();
                    dmAlert(e.message, drivemepayment.locale_error);
                }
            }
        },

        check: function (onsuccess) {

            var self = this;
            var success = false;

            var data = self.options.info.find(':input').serialize();
            data += '&security='+drivemepayment.security + '&action=payment_check';

            self.options.info.find('.input-error').removeClass('input-error');
            self.options.info.find('.field-error').html('').hide();

            $.ajax({
                type: 'post',
                url: drivemepayment.ajaxurl,
                data: data,
                dataType: 'json',
                success: function (response) {

                    if (response.ok) {
                        success = true;
                        onsuccess();
                    } else if (response.errors) {
                        $.each(response.errors, function(i, e) {
                            self.options.info.find('[name="' + i + '"]').each(function () {
                                var $el = $(this);
                                $el.addClass('input-error');
                                $el.siblings('.field-error').html(e).show();
                            });
                        });

                        if (self.options.wrap.length > 0) $('html, body').animate({ scrollTop: self.options.wrap.offset().top}, 600);
                    } else
                        dmAlert(drivemepayment.locale_error_unknown, drivemepayment.locale_error);
                },
                error: function (request, status, error) {
                    dmAlert(error, drivemepayment.locale_error);
                }
            }).always(function () {
                if (!success)
                    self.unlock();
            });
        },

        lock: function () {
            this.options.wrap.addClass('loading');
            this.options.wrap.find('input[type="submit"], button').prop('disabled', true);
        },

        unlock: function () {
            this.options.wrap.removeClass('loading');
            this.options.wrap.find('input[type="submit"], button').prop('disabled', false);
        }

    };

    $.fn[pluginName] = function(options) {

        this.each(function () {

            if (typeof $.data(this, pluginName) == 'function') return;

            var instance = new $[pluginName](this, options);
            $.data(this, pluginName, instance);
        });

        return this;
    };

    $(function () {

        var $wrap = $('#payment-wrap');

        $wrap.databind({

            money: {
                decimal: '.',
                thousands: '`',
                cutzero: false
            },
            calculate: function (data) {

                var spl = data.course ? data.course : '0:0:0';
                spl = spl.split(':');
                data.cid = parseFloat(spl[0]);
                data.sku = drivemepayment.sku_prfx + data.cid;
                data.amount = parseFloat(spl[1] ? spl[1] : 0);
                data.ready2pay = data.cid > 0 ? 1 : 0;
                data.item = spl[2] ? spl[2] : 'Course #' + data.cid;

                data.custom = {};
                $.each(['cid', 'firstname', 'lastname', 'phone', 'email', 'date', 'message'], function (i, e) {
                    data.custom[e] = data[e];
                });
                data.custom = encodeURIComponent(JSON.stringify(data.custom));
            }
        });
        $wrap.find('form')[pluginName]({
            wrap: $wrap,
            info: $wrap.find('.billing-form')
        });

    });

})(jQuery);


Number.prototype.formatMoney = function (c, d, t) {
    var n = this,
        c = isNaN(c = Math.abs(c)) ? 2 : c,
        d = d == undefined ? "." : d,
        t = t == undefined ? "," : t,
        s = n < 0 ? "-" : "",
        i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
        j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
};


(function ($, document, window, undefined) {

    "use strict";

    var pluginName = 'databind';

    var dataBinder = function (that, element, path) {

        var self = this;

        this.that = that;
        this.element = element;
        this.path = path;
        this.methods = {
            'input': ['none', []],
            'output': ['none', []],
            'filterin': ['none', []],
            'filterout': ['none', []],
            'event': ['none', []]
        };

        var parts = $.map(element.data('bind').split(','), $.trim);

        for (var i = 0, l = parts.length; i < l; i++) {
            var $segments = $.map(parts[i].split(':'), $.trim);
            var $m = $segments[0];
            var $arg = $segments[1] ? $.map($segments[1].replace(/\]/g, "").split(/\[/), $.trim) : [''];
            var $f = $arg.shift();

            if ($m == 'in') {
                this._add_method('input', $f, $arg);
            } else if ($m == 'out') {
                this._add_method('output', $f, $arg);
            } else if ($m == 'f') {
                this._add_method('filterin', $f, $arg);
                this._add_method('filterout', $f, $arg);
            } else if ($m == 'e') {
                this._add_method('event', $f, $arg);
            }
        }

        if (this.methods['input'][0] != 'none') {
            element.bind('change recalculate', function (event) {
                self.event(event);
            });
        }

        //Initializing associated data with empty value
        this.that._data_set(path, this._run('filterin', ''));
    };

    dataBinder.prototype = {

        read: function () {
            var value = this._run('input', this.element);
            value = this._run('filterin', value);
            return value;
        },
        input: function () {
            if (this.methods['input'][0] == 'none') return false;
            var value = this.read();
            var oldvalue = this.that._data_get(this.path);
            this.that._data_set(this.path, value);
            return oldvalue != value;
        },
        write: function (value) {
            this._run('output', this.element, this._run('filterout', value), value);
            return true;
        },
        output: function () {
            if (this.methods['output'][0] == 'none') return false;
            var value = this.that._data_get(this.path);
            return this.write(value);
        },
        event: function (event) {
            var is_updated = this.input();

            if (this._custom_events(event))
                is_updated = true;

            if (is_updated) this.that._update();
        },

        _custom_events: function () {
            if (this.methods['event'][0] == 'none') return false;

            return Boolean(this._run('event', event, this.element));
        },

        _add_method: function (type, func, arg) {
            this.methods[type] = [typeof this.that.opts[type][func] == 'function' ? func : 'none', arg];
        },

        _run: function () {

            if (arguments.length === 0) return;
            var args = [];
            Array.prototype.push.apply(args, arguments);

            var type = args.shift();

            var method = this.that.opts[type][this.methods[type][0]];
            if (typeof method == 'undefined') return null;
            return this.that.opts[type][this.methods[type][0]].apply(this, args.concat(this.methods[type][1]));
        }
    };

    $[pluginName] = function (parent, options) {

        var self = this;

        var defaults = {money: {decimal: '.', thousands: '`', cutzero: true}};

        self.data = options.data ? $.extend({}, options.data) : {};
        self.binder = {};

        delete options.data;

        self.opts = {};

        self.opts.calculate = function (data) {
        };

        self.opts.event = {
            none: function (element) {
                return false;
            }
        };

        self.opts.input = {
            none: function (element) {
                return null;
            },
            text: function (element) {
                return element.text();
            },
            html: function (element) {
                return element.html();
            },
            value: function (element) {
                return element.val();
            },
            radio: function (element) {
                return $("input:radio[name ='" + element.attr('name') + "']:checked").val();
            },
            checkbox: function (element) {
                return element.is(':checked') ? element.val() : null;
            },
            prop: function (element, property) {
                return element.prop(property);
            },
            attr: function (element, attribute) {
                return element.attr(attribute);
            },
            visibility: function (element) {
                return element.is(':visible');
            },
            toggle: function (element, property) {
                return element.is('.' + property);
            }
        };

        self.opts.output = {
            none: function (element, value, unformatted) {
                return null;
            },
            text: function (element, value, unformatted) {
                return element.text(value);
            },
            html: function (element, value, unformatted) {
                return element.html(value);
            },
            value: function (element, value, unformatted) {
                return element.val(value);
            },
            prop: function (element, value, unformatted, property) {
                element.prop(property, value);
            },
            attr: function (element, value, unformatted, attribute) {
                element.attr(attribute, value);
            },
            visibility: function (element, value, unformatted) {
                return value ? element.show() : element.hide();
            },
            toggle: function (element, value, unformatted, property) {
                return element.toggleClass(property, value ? true : false);
            },
            price: function (element, value, unformatted) {
                element.find('.pr-sign').toggle(unformatted <= 0);
                element.find('.pr-wrap').toggle(unformatted != 0);
                element.find('.pr').text(value.replace('-', ''));
            }
        };

        self.opts.filterin = {
            none: function (value) {
                return value;
            },
            int: function (value) {
                value = parseInt(value);
                if (isNaN(value)) value = 0;
                return value;
            },
            float: function (value) {
                if (!value) return 0.0;
                value = parseFloat(value.replace(/[^0-9\.\-]/, ''));
                if (isNaN(value)) value = 0.0;
                return value;
            },
            bool: function (value) {
                return Boolean(value);
            },
            currency: function (value) {
                return self.opts.filterin.float(value);
            }
        };

        self.opts.filterout = {
            none: function (value) {
                return value;
            },
            int: function (value) {
                return Math.round(value);
            },
            float: function (value) {
                return value.toFixed(2);
            },
            bool: function (value) {
                return Boolean(value);
            },
            currency: function (value) {
                if (!value) return '-';
                var res = value.formatMoney(self.opts.money.decimal == '' ? 0 : 2, self.opts.money.decimal, self.opts.money.thousands);
                if (self.opts.money.cutzero) res = res.replace(new RegExp('\\' + self.opts.money.decimal + '00$'), '')
                return res;
            }
        };

        self.opts = $.extend(true, {}, defaults, self.opts, options);
        this.init(parent);
    };

    $[pluginName].prototype = {

        init: function (parent) {

            var self = this;

            self.binder = [];

            parent.find('[data-bind]').each(function () {
                var element = $(this);
                var attr = element.attr('data-name');
                if (typeof attr == 'undefined' || attr == false) attr = element.attr('name');
                if (!attr) return;

                var path = $.map(attr.replace(/\]/g, "").split(/\[/), $.trim);

                var index = self.binder.push(new dataBinder(self, element, path));
                $.data(element.get(0), 'data-binding', self.binder[index - 1]);
            });

            this._get();
            this._update();
        },

        _data_set: function getValueAt(keys, value) {
            var object = this.data,
                i = 0,
                len = keys.length;

            while (i < len - 1) {
                if (typeof object[keys[i]] == 'undefined')
                    object[keys[i]] = {};

                object = object[keys[i]];

                i++;
            }

            var oldvalue = object[keys[i]];
            object[keys[i]] = value;
            return oldvalue;
        },

        _data_get: function getValueAt(keys, def) {
            var object = this.data,
                i = 0,
                len = keys.length;

            while (i < len - 1) {

                if (typeof object[keys[i]] == 'undefined')
                    object[keys[i]] = {};

                object = object[keys[i]];
                i++;
            }

            if (typeof object[keys[i]] == 'undefined')
                return def;

            return object[keys[i]];
        },

        _get: function () {
            for (var i = 0, l = this.binder.length; i < l; i++)
                this.binder[i].input();
            for (i = 0, l = this.binder.length; i < l; i++)
                this.binder[i]._custom_events();
        },

        _set: function () {
            for (var i = 0, l = this.binder.length; i < l; i++)
                this.binder[i].output();
        },

        _update: function () {
            if (typeof this.opts.calculate == 'function') this.opts.calculate(this.data);
            this._set();
        }

    };

    $.fn[pluginName] = function (options) {
        var instance = new $[pluginName](this, options);

        this.each(function () {
            $.data(this, 'databind', instance);
        });

        return instance;
    };

})(jQuery, document, window);
