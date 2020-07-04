define([
    'uiComponent',
    'jquery',
    'ko',
    'Magento_Customer/js/customer-data',
    'mage/translate'
], function (Component, $, ko, customerData, $t) {
    'use strict';
    return Component.extend({
        defaults: {
            template: 'Dynamic_Contact/form'
        },

        step: ko.observable(0),

        initialize: function () {
            this.getCurrentStep();
            let self = this;
            this._super();

            return this;
        },

        getCurrentStep: function () {
            if (customerData.get('customer')().fullname) {
                this.step(1);
            }
            this.step(0);
        },

        isLoginVisible: function () {
            return this.step === 0;
        },

        isFirstStepVisible: function () {
            return this.step === 1;
        },
        isSecondStepVisible: function () {
            return this.step === 2;
        },

        getFormKey: function() {
            return $.cookie('form_key');
        },

        initFrom: function () {
            // $('.first-step').css({opacity: 1});
            // $('.second-step').css({opacity: 0});
            // $('.second-step .field.image').hide();
            // $('.second-step').hide();
            // $('.first-step').show();
            // $('#step2').on('click',function (e) {
            //     e.preventDefault();
            //     var subject = $( ".first-step #subject option:selected" ).val();
            //     if(subject == 'wrong') {
            //         $('.second-step .field.image').show();
            //     }
            //     $( ".first-step" ).animate({
            //         opacity: 0
            //     }, 500, function() {
            //         $('.first-step').hide();
            //         $('.second-step').show();
            //         $( ".second-step" ).animate({
            //             opacity: 1
            //         }, 500);
            //     });
            // });
            // $('.change-subject').on('click', function () {
            //     $( ".second-step" ).animate({
            //         opacity: 0
            //     }, 500, function() {
            //         $('.second-step').hide();
            //         $('.first-step').show();
            //         $( ".first-step" ).animate({
            //             opacity: 1
            //         }, 500);
            //     });
            // });
        }

    });
});
