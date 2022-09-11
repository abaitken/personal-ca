function ViewModel() {
    let self = this;

    self.certificates = ko.observableArray([]);

    self.fetchCertificates = function() {
        return new Promise((resolve, reject) => {
            $.ajax({
                type: 'GET',
                url: '/api/Certificates',
                dataType: 'json',
                mimeType: 'application/json',
                success: function (data) {
                    resolve(data);
                },
                error: function (error) {
                    reject(error);
                }
            });
        });
    };

    self.Init = function () {
        self.fetchCertificates()
            .then((data) => {
                self.certificates(data);
            });
    };
}

let vm = new ViewModel();
vm.Init();
