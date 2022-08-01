define([
    'jquery',
    'uiComponent',
    'ko',
    'Magento_Customer/js/customer-data'
    ], function ($, Component, ko, customerData) {
        'use strict';
        return Component.extend({
            initialize: function () {
                this._super();
                let emiplans = customerData.get('customer-gender-section');
                let product_price = Number(this.price);
                let data = [];
                $.each(emiplans().emi, function (index, value) {
                    let plan = (product_price + product_price * (value.interest_rate / 100)) / value.tenure;
                    let total_interest = (plan.toFixed(2)*value.tenure)-product_price;
                    let plan_tenure = plan.toFixed(2)+' x '+value.tenure+'m';
                    let interest = total_interest.toFixed(2)+' ('+value.interest_rate+'%)';
                    let cost = plan.toFixed(2)*value.tenure;
                    data[index] = '<td>'+plan_tenure+'</td><td>'+interest+'</td><td>'+cost+'</td>';
                });
                this.emiData = data;
            }
        });
    }
);
