function ViewModel() {
    let self = this;
    self._data = new DataSource();

    self.certificates = ko.observableArray([]);
    self.breadcrumb = ko.observableArray([]);

    self.openChildContainer = function(item) {
        self.breadcrumb.push(item);
        self._data.fetchCertificates(item['id'])
            .then((data) => {
                self.certificates(data);
            });
    };

    self.jumpToContainer = function(item) {
        console.log('jumpToContainer');
        console.log(item);
    };

    self.Init = function () {
        ko.applyBindings(self);
        self.breadcrumb.push({
            'name': 'Root Certificates',
            'id': '0'
        });
        self._data.fetchCertificates(self.breadcrumb()[0]['id'])
            .then((data) => {
                self.certificates(data);
            });
    };
}

let vm = new ViewModel();
vm.Init();
