!function(n){"use strict";window.jnews.socialLogin=window.jnews.socialLogin||{},void 0===jnews.body_inject&&(window.jnews.body_inject=n("body")),window.jnews.socialLogin={init:function(){this.xhr=null,this.container=jnews.body_inject.find(".social-login-wrapper"),this.button={facebook:this.container.find(".social-login-item .btn-facebook"),google:this.container.find(".social-login-item .btn-google"),linkedin:this.container.find(".social-login-item .btn-linkedin")},this.setEvent()},setEvent:function(){var i=this;for(var o in i.button)i.button[o].length>0&&i.button[o].on("click",(function(o){o.preventDefault();var t=n(this).attr("class").split(/\s+/)[1].substr(4);null!==i.xhr&&(i.xhr.abort(),i.xhr=null),i.doAjax(t)}))},doAjax:function(i){this.xhr=n.ajax({url:jnews_ajax_url,type:"post",dataType:"json",data:{action:"social_login",login_type:i}}).done((function(n){!1!==n.url&&(window.location.href=n.url)}))}},n(document).on("ready",(function(){jnews.socialLogin.init()}))}(jQuery);