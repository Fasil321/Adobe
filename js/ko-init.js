jQuery(function(){
    var viewModelConstructor = function()
    {
        this.theValue1 = ko.observable("");
        this.theValue2 = ko.observable("");
        this.theValue =  ko.observable("");
        this.addValue =  function () {
            this.theValue(Number(this.theValue1()) + Number(this.theValue2()))
        };
    }

    var viewModel = new viewModelConstructor;
    ko.applyBindings(viewModel);
});
