/**
 * Copyright (c) 2012-2019, Mollie B.V.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * - Redistributions of source code must retain the above copyright notice,
 *    this list of conditions and the following disclaimer.
 * - Redistributions in binary form must reproduce the above copyright
 *    notice, this list of conditions and the following disclaimer in the
 *    documentation and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE AUTHOR AND CONTRIBUTORS ``AS IS'' AND ANY
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE AUTHOR OR CONTRIBUTORS BE LIABLE FOR ANY
 * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY
 * OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH
 * DAMAGE.
 *
 * @author     Mollie B.V. <info@mollie.nl>
 * @copyright  Mollie B.V.
 * @license    Berkeley Software Distribution License (BSD-License 2) http://www.opensource.org/licenses/bsd-license.php
 * @category   Mollie
 * @package    Mollie
 * @link       https://www.mollie.nl
 * @codingStandardsIgnoreStart
 */
$(document).ready(function () {
    var $mollieContainers = $('.mollie-iframe-container');
    if (!$mollieContainers.length) {
        return;
    }
    var options = {
        styles: {
            base: {
                color: "#222",
                fontSize: "15px;",
                padding: "15px"
            }
        }
    };
    var mollie = Mollie(profileId, {locale: 'en_US', testMode: true});
    var cardHolder = mollie.createComponent('cardHolder', options);
    var cardNumber = mollie.createComponent('cardNumber', options);
    var expiryDate = mollie.createComponent('expiryDate', options);
    var verificationCode = mollie.createComponent('verificationCode', options);

    var cardHolderInput;
    var carNumberInput;
    var expiryDateInput;
    var verificationCodeInput;

    var methodId = $(this).find('input[name="method-id"]').val();
    mountMollieComponents(methodId);

    $('input[data-module-name="mollie"]').on('change', function () {
        var paymentOption = $(this).attr('id');
        var methodId = $('#' + paymentOption + '-additional-information').find('input[name="method-id"]').val();
        if(!methodId) {
            return;
        }
        cardHolderInput.unmount();
        carNumberInput.unmount();
        expiryDateInput.unmount();
        verificationCodeInput.unmount();

        mountMollieComponents(methodId);
    });

    function mountMollieComponents(methodId) {
        cardHolderInput = mountMollieField(this, '#card-holder', methodId, cardHolder);
        carNumberInput = mountMollieField(this, '#card-number', methodId, cardNumber);
        expiryDateInput = mountMollieField(this, '#expiry-date', methodId, expiryDate);
        verificationCodeInput = mountMollieField(this, '#verification-code', methodId, verificationCode);

        var $mollieCardToken = $('input[name="mollieCardToken' + methodId + '"]');
        var isResubmit = false;
        $mollieCardToken.closest('form').on('submit', function (event) {
            var $form = $(this);
            if (isResubmit) {
                return;
            }
            event.preventDefault();
            mollie.createToken().then(function (token) {
                if (token.error) {
                    var $mollieAlert = $('.js-mollie-alert');
                    $mollieAlert.closest('article').show();
                    $mollieAlert.text(token.error.message);
                    return;
                }
                $mollieCardToken.val(token.token);
                isResubmit = true;
                $form.submit();
            });
        });
    }

    function mountMollieField(mollieContainer, holderId, methodId, inputHolder) {
        var invalidClass = 'is-invalid';
        var cardHolderId = holderId + '-' + methodId;
        inputHolder.mount(cardHolderId);
        var cardHolderError = $(cardHolderId + '-error');
        inputHolder.addEventListener('change', function (event) {
            if (event.error && event.touched) {
                cardHolderError.find('p').text(event.error);
                $(cardHolderId).addClass(invalidClass);
            } else {
                cardHolderError.find('p').text('');
                $(cardHolderId).removeClass(invalidClass);
            }
        });

        return inputHolder;
    }
});