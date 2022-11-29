import $ from 'jquery';
import Raven from '../lib/Raven';
import { domElements } from '../constants/selectors';
import ThickBoxModal from '../feedback/ThickBoxModal';
import { submitFeedbackForm } from '../feedback/feedbackFormApi';
import { initAppOnReady } from '../utils/appUtils';

function deactivatePlugin() {
  const href = $(domElements.deactivatePluginButton).attr('href');
  if (href) {
    window.location.href = href;
  }
}

function setLoadingState() {
  $(domElements.deactivateFeedbackSubmit).addClass('loading');
}

function submitAndDeactivate(e: Event) {
  e.preventDefault();
  setLoadingState();

  submitFeedbackForm(domElements.deactivateFeedbackForm)
    .then(deactivatePlugin)
    .catch((err: Error) => {
      Raven.captureException(err);
      deactivatePlugin();
    });
}

function init() {
  // eslint-disable-next-line no-new
  new ThickBoxModal(
    domElements.deactivatePluginButton,
    'leadin-feedback-container',
    'leadin-feedback-window',
    'leadin-feedback-content'
  );

  $(domElements.deactivateFeedbackForm)
    .off('submit')
    .on('submit', submitAndDeactivate);
  $(domElements.deactivateFeedbackSkip)
    .off('click')
    .on('click', deactivatePlugin);
}

initAppOnReady(init);
