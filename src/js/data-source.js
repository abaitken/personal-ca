function CreateDataSource()
{

    if (location.href.startsWith('file'))
        return new TestDataSource();

    return new DataSource();
}

function TestDataSource()
{
    let self = this;
    self.fetchCertificates = function(){
        return new Promise((resolve, reject) => {
            resolve([]);
        });
    };
}

function DataSource()
{
    let self = this;
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
}
