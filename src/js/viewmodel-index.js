function ViewModel() {
    let self = this;
    self._data = CreateDataSource();

    self.certificates = ko.observableArray([]);

    self.Init = function () {
        self._data.fetchCertificates()
            .then((data) => {
                self.certificates(data);
            });
    };
}

let vm = new ViewModel();
vm.Init();
