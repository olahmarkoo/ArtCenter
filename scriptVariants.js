function createVariants(data) {
    for (let index = 0; index < data.length; index++) {
        var formData = new FormData();

        let sizes = document.getElementsByClassName("sizePrice");
        for (let index = 0; index < sizes.length; index++) {
            formData.append("productSizes[]",sizes[index].value);
        }

        let materials = document.getElementsByClassName("materialPrice");
        for (let index = 0; index < materials.length; index++) {
            formData.append("productMaterials[]",materials[index].value);
        }

        formData.append("function", "variantsInsert");
        formData.append("productId",data[index].id);

        fetch('db.php', {
            method: 'POST',
            body: formData,
            })
            .then(response => response.text())
            .then(request => {
                console.log(request);
            })
            .catch(error => {
            console.error('Error:', error);
            });
    }
}


function variantsDelete() {
    var formData = new FormData();
    formData.append("function", "variantsDelete");
    
    fetch('db.php', {
        method: 'POST',
        body: formData,
        })
        .then(response => response.text())
        .then(request => {
            console.log(request);
        })
        .catch(error => {
        console.error('Error:', error);
        });
}