function DataSource()
{
    let self = this;
    self.fetchCertificates = function(parent) {
        return new Promise((resolve, reject) => {
            selectRoot = (parent == null || parent === undefined || parent === '0');
            args = selectRoot ? '' : '?container=' + parent;

            $.ajax({
                type: 'GET',
                url: 'api/Certificates' + args,
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
}
