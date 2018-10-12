{*
 *
 * Copyright (c) 2012-2018, Mollie B.V.
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
 *
 *}
<div id="mollie_order"></div>
<script type="text/javascript">
  (function () {
    window.MollieModule.back.orderInfo(
      "#mollie_order",
      {
        ajaxEndpoint: '{$ajaxEndpoint|escape:'javascript':'UTF-8'}',
        moduleDir: '{$module_dir|escape:'javascript':'UTF-8'}',
        initialStatus: 'form',
        transactionId: '{$transactionId|escape:'javascript':'UTF-8'}',
      },
      {
        areYouSure: '{l s='Are you sure?' mod='mollie' js=1}',
        areYouSureYouWantToRefund: '{l s='Are you sure you want to refund this order?' mod='mollie' js=1}',
        refund: '{l s='Refund' mod='mollie' js=1}',
        cancel: '{l s='Cancel' mod='mollie' js=1}',
        refundOrder:'{l s='Refund order' mod='mollie' js=1}',
        remaining: '{l s='Remaining' mod='mollie' js=1}',
        partialRefund: '{l s='Partial refund' mod='mollie' js=1}',
        invalidAmount: '{l s='Invalid amount' mod='mollie' js=1}',
        notAValidAmount: '{l s='You have entered an invalid amount' mod='mollie' js=1}',
        refundFailed: '{l s='Refund failed' mod='mollie' js=1}',
        unableToRefund: '{l s='Unable to refund' mod='mollie' js=1}',
        paymentInfo: '{l s='Payment info' mod='mollie' js=1}',
        transactionId: '{l s='Transaction ID' mod='mollie' js=1}',
        refundHistory: '{l s='Refund history' mod='mollie' js=1}',
        thereAreNoRefunds: '{l s='There are no refunds' mod='mollie' js=1}',
        ID: '{l s='ID' mod='mollie' js=1}',
        date: '{l s='Date' mod='mollie' js=1}',
        amount: '{l s='Amount' mod='mollie' js=1}',
        refunds: '{l s='Refunds' mod='mollie' js=1}',
        payments: '{l s='Payments' mod='mollie' js=1}',
        refunded: '{l s='Refunded' mod='mollie' js=1}',
        currentAmount: '{l s='Current amount' mod='mollie' js=1}',
      },
      {Tools::jsonEncode($currencies)}
    );
  }());
</script>