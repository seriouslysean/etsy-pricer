jQuery(function($){

    function setupEtsyPricer() {
      function timeToInteger(time) {
        time = time.split(/:/);
        //
        hours = parseInt(time[0]);
        minutes = (parseInt(time[1])/60);
        //
        spent = parseFloat(hours+minutes);
        //
        return spent;
      }

      $('form.etsy-pricer').each(function(){
        $('#'+$(this).data('prefix')+'etsy_pricer').on('submit', function(e){
            e.preventDefault();
        });

        $('#'+$(this).data('prefix')+'etsy_pricer').on('valid', function(e){
            e.preventDefault();
            // PRODUCT
            // How much is the time spent making the item worth?
            timeSpent = timeToInteger($('#'+$(this).data('prefix')+'time_spent').val());
            costPerHour = parseFloat($('#'+$(this).data('prefix')+'dollars_hour').val());
            timeCost = parseFloat(timeSpent*costPerHour);
            //
            materialCost = parseFloat($('#'+$(this).data('prefix')+'materials_cost').val());
            expenseCost = parseFloat($('#'+$(this).data('prefix')+'expense_cost').val());
            //
            initialCost = timeCost+materialCost+expenseCost;
            profitMargin = parseInt($('#'+$(this).data('prefix')+'profit_margin_hidden').val())/100;

            // FEES
            shippingFee = 0;
            if ($('#'+$(this).data('prefix')+'shipping_fee').length)
                shippingFee = parseFloat($('#'+$(this).data('prefix')+'shipping_fee').val());
            transactionCost = 0;
            if ($('#'+$(this).data('prefix')+'transaction_cost').length)
                transactionCost = parseFloat($('#'+$(this).data('prefix')+'transaction_cost').val());
            transactionFee = 0;
            if ($('#'+$(this).data('prefix')+'transaction_fee').length)
                transactionFee = parseFloat($('#'+$(this).data('prefix')+'transaction_fee').val())/100;

            // RESULT
            preWholesaleCost = parseFloat((initialCost*profitMargin)+initialCost);
            preRetailCost = parseFloat(preWholesaleCost*2);
            preWholesaleCostWithShipping = preWholesaleCost+shippingFee;
            preRetailCostWithShipping = preRetailCost+shippingFee;
            //
            wholesaleCost = (preWholesaleCost+(preWholesaleCostWithShipping*transactionFee))+transactionCost;
            wholesaleCostWithShipping = (preWholesaleCostWithShipping+(preWholesaleCostWithShipping*transactionFee))+transactionCost;
            retailCost = (preRetailCost+(preRetailCostWithShipping*transactionFee))+transactionCost;
            retailCostWithShipping = (preRetailCostWithShipping+(preRetailCostWithShipping*transactionFee))+transactionCost;
            //
            $('#'+$(this).data('prefix')+'cost_wholesale').html('$'+wholesaleCost.toFixed(2));
            $('#'+$(this).data('prefix')+'cost_wholesale_shipping').html('$'+wholesaleCostWithShipping.toFixed(2));
            $('#'+$(this).data('prefix')+'cost_retail').html('$'+retailCost.toFixed(2));
            $('#'+$(this).data('prefix')+'cost_retail_shipping').html('$'+retailCostWithShipping.toFixed(2));
        });
      });
    }
    setupEtsyPricer();

});