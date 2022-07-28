jQuery(function(){
    var viewModelConstructor = function()
    {
        this.theValue1 = ko.observable("");
        this.theValue2 = ko.observable("");
        this.theValue =  ko.computed(function () {
            return Number(this.theValue1()) + Number(this.theValue2())
        }, this);
    }

    window.viewModel = new viewModelConstructor;
    ko.applyBindings(window.viewModel);
});
