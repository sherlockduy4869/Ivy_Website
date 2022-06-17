$(function(){
                
    var table = $('#product_list').DataTable({
        ajax: 'getproductlist.php',
        initComplete: function (settings, json) {
            console.log("initComplete: " + json.data.length);
        },
        columns: [
            { 'data' : 'product_id' },
            { 'data' : 'product_name' },
            { 'data' : 'cateName' },
            { 'data' : 'price' }
        ]
    });
    
});