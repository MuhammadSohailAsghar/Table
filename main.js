

$(document).ready(() => {
    //Getting total and net total value
     $('#price').keyup(mul);
     $('#qty').keyup(mul);
    
    function mul() {
        let price = $('#price').val();
        let qty = $('#qty').val()
        $('#total').val( price * qty );
        $('#nettotal').val(price * qty);
    };
    //Getting nettotal value with discount
    $('#total').keyup(minus);
    $('#dis').keyup(minus);
    function minus() {
        let total = $('#total').val();
        let dis = $('#dis').val();

        let nettotal = total - dis;
        $('#nettotal').val(nettotal);
    };
    //Getting discount % value from discount number
    $('#dis').keyup(disper);
    $('#total').keyup(disper);
    function disper() {
        let dis = $('#dis').val();
        let total = $('#total').val();
        let nettotal = $('#nettotal').val();

        let disper = dis / total * 100;
        $('#disper').val(disper);

        let disp = ((total - nettotal) / total * 100);
        $('#disper').val(disp);
    };
    //Getting dicount number ftom nettotal 
    $('#total').keyup(dis);
    $('#nettotal').keyup(dis);
    function dis() {
        let total = $('#total').val();
        let nettotal = $('#nettotal').val();

        let discount = total - nettotal;
        $('#dis').val(discount);
    };

    //getting discount value from discount % value
    $('#total').keyup(per);
    $('#disper').keyup(per);
        function per() {
            let total = $('#total').val();
            let disper = $('#disper').val();

            let discount = (disper / 100) * total;
        $('#dis').val(discount);
        
    };
    //Getting nettotal value with discount %
    $('#disper').keyup(nt);
    $('#total').keyup(nt);
    function nt() {

        let disper = $('#disper').val();
        let total = $('#total').val();

        let dis = (disper / 100) * total;
        let nett = total - dis;

        $('#nettotal').val(nett);
    };


    

    


});

    //Appending input values to the table row

function addRow() {
    //Condition for zero value in total
    if($('#total').val() > 0) {
        let ID = $('#ID').val();
        let name = $('#name').val();
        let price = $('#price').val();
        let qty = $('#qty').val();
        let total = $('#total').val();
        let dis = $('#dis').val();
        let disper = $('#disper').val();
        let nettotal = $('#nettotal').val();

        
        ID = parseInt(ID) + parseInt(1);
        $('#table').append('<tr class="rowone" id="row_'+ID+'"><td>'+ID+'</td><td> <input type="hidden" value="'+name+'" id="name'+ID+'" name="name'+ID+'"> '+name+'</td><td> <input type="hidden" value="'+price+'" id="price'+ID+'" name="price'+ID+'">'+price+'</td><td> <input type="hidden" value="'+qty+'" id="qty'+ID+'" name="qty'+ID+'">'+qty+'</td><td> <input type="hidden" value="'+total+'"  id="total'+ID+'" name="total'+ID+'">'+total+'</td><td> <input type="hidden" value="'+dis+'" id="dis'+ID+'" name="dis'+ID+'">'+dis+'</td><td> <input type="hidden" value="'+disper+'" id="disper'+ID+'" name="disper'+ID+'">'+disper+'</td><td> <input type="hidden" value="'+nettotal+'" class="ntotal" id="nettotal'+ID+'" name="nettotal'+ID+'">'+nettotal+'</td><td><button class="btn2" type="button" onclick="delRow('+ID+')">Delete</button><button class="btn3" type="button" onclick="javascript:editRow('+ID+');">Edit</button></td></tr>');
        
        $('#ID').val(ID);
        
        
        $('#name').val('');
        $('#price').val('');
        $('#qty').val('');
        $('#total').val('');
        $('#dis').val('');
        $('#disper').val('');
        $('#nettotal').val('');

        getTotal();
    } else {
        alert('Total input have no value.');
    };
    
   
};
// $(".btn2").live('click', function(event) {
//     $(this).parent().parent().remove();
// });

    // Getting the final total
    function getTotal(){
        var total = 0;
        $('.ntotal').each(function(){
            total += parseFloat(this.value)
            
        });
        $('#total_2').val(total);
        $('#net_total').val(total);
        //document.getElementById('total_2').value = total;
        //document.getElementById('net_total').value = total;
    };
    // Getting final nettotal
    $('#total_2').keyup(minus);
    $('#dis_2').keyup(minus);
    function minus() {
        let total = $('#total_2').val();
        let dis = $('#dis_2').val();

        let nettotal = total - dis;
        $('#net_total').val(nettotal);
    };
    //Getting final discount %
    $('#dis_2').keyup(disper);
    $('#total_2').keyup(disper);
    function disper() {
        let dis = $('#dis_2').val();
        let total = $('#total_2').val();
        let nettotal = $('#net_total').val();

        let disper = dis / total * 100;
        $('#disper_2').val(disper);

        // let disp = ((total - nettotal) / total * 100);
        // $('#disper').val(disp);
    };
    //Getting final discount from discount %
    $('#total_2').keyup(per);
    $('#disper_2').keyup(per);
        function per() {
            let total = $('#total_2').val();
            let disper = $('#disper_2').val();

            let discount = (disper / 100) * total;
        $('#dis_2').val(discount);
        
    };
    //getting final nettotal with discount %
    $('#disper_2').keyup(nt);
    $('#total_2').keyup(nt);
    function nt() {

        let disper = $('#disper_2').val();
        let total = $('#total_2').val();

        let dis = (disper / 100) * total;
        let nett = total - dis;

        $('#net_total').val(nett);
    };




function delRow(id) {

    $('#row_'+id).remove();
    // $('#row1').remove();
};

// function to edit row
function editRow(id){
    // fetching values
    let name = $('#name'+id).val();
    let price = $('#price'+id).val();
    let qty = $('#qty'+id).val();
    let total = $('#total'+id).val();
    let dis = $('#dis'+id).val();
    let disper = $('#disper'+id).val();
    let nettotal = $('#nettotal'+id).val();

    // setting values
    $('#name').val(name);
    $('#price').val(price);
    $('#qty').val(qty);
    $('#total').val(total);
    $('#dis').val(dis);
    $('#disper').val(disper);
    $('#nettotal').val(nettotal);

    // changing add button to update
    $('#btn_div').html('<button class="btn1" id="update" type="button" onclick="update('+id+')">Update</button><button type="button" class="btn1" id="clear" onclick="clearVal()">clear</button>');

};



function update(id) {


    // let ID = $('#ID').val();
    let name = $('#name').val();
    let price = $('#price').val();
    let qty = $('#qty').val();
    let total = $('#total').val();
    let dis = $('#dis').val();
    let disper = $('#disper').val();
    let nettotal = $('#nettotal').val();

    
    // ID = parseInt(ID) + parseInt(1);

    $('#row_'+id).html('<td>'+id+'</td><td> <input type="hidden" value="'+name+'" id="name'+id+'"> '+name+'</td><td> <input type="hidden" value="'+price+'" id="price'+id+'">'+price+'</td><td> <input type="hidden" value="'+qty+'" id="qty'+id+'">'+qty+'</td><td> <input type="hidden" value="'+total+'" id="total'+id+'">'+total+'</td><td> <input type="hidden" value="'+dis+'" id="dis'+id+'">'+dis+'</td><td> <input type="hidden" value="'+disper+'" id="disper'+id+'">'+disper+'</td><td> <input type="hidden" value="'+nettotal+'" class="ntotal" id="nettotal'+id+'">'+nettotal+'</td><td><button class="btn2" onclick="delRow('+id+')">Delete</button><button class="btn3" type="button" onclick="editRow('+id+')">Edit</button></td>');
    
    // $('#ID').val(ID);

    
    $('#name').val('');
    $('#price').val('');
    $('#qty').val('');
    $('#total').val('');
    $('#dis').val('');
    $('#disper').val('');
    $('#nettotal').val('');
    
    $('#btn_div').html('<button class="btn1" id="add" onclick="addRow()">Add</button>');

    getTotal()
    
};

function getTotal(){
    var total = 0;
    $('.ntotal').each(function(){
        total += parseFloat(this.value)
        
    });
    $('#total_2').val(total);
    $('#net_total').val(total);
    //document.getElementById('total_2').value = total;
    //document.getElementById('net_total').value = total;
};
    //clearing input values
function clearVal() {

    $('#name').val('');
    $('#price').val('');
    $('#qty').val('');
    $('#total').val('');
    $('#dis').val('');
    $('#disper').val('');
    $('#nettotal').val('');

    $('#btn_div').html('<button class="btn1" id="add" onclick="addRow()">Add</button>');
};

function updateData(){
    var myform = document.getElementById("form_data");
    var fd = new FormData(myform);

    var billNo = $('#billNo').val();

    $.ajax({
        url: "update.php",
        data: fd,
        cache: false,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (response) {
            if(response == 'Success'){
                window.location = "http://localhost/table/search.php?billNo="+billNo;
            }

        }
    });
};

 //let sum = $('.total').val().keyup();

//$('#total2').val(sum);

// $('.total').each(function () {
//     $(this).keyup(function () {
//         calculateSum();
//     });
// });
// function calculateSum() {
//     var sum = 0;
//     //iterate through each textboxes and add the values
//     $(".total").each(function () {
//         //add only if the value is number
//         if (!isNaN(this.value) && this.value.length != 0) {
//             sum += parseFloat(this.value);
//         }
//     });

//     //.toFixed() method will roundoff the final sum to 2 decimal places
//     $("#total2").val(sum.toFixed(2));
// }

// $('td #total').keyup(total);
//     function total() {
//         let ttl = $('td #total').val();

//         let plus = row + row;

//         $('#total2 ').val(ttl);
//     };


/*
$(document).ready(() => {

    $('#price').keyup(cal);
    $('#qty').keyup(cal);
    $('#total').keyup(cal);
    $('#dis').keyup(cal);
    $('#disper').keyup(cal);
    $('#nettotal').keyup(cal);
    function cal() {
        let price = $('#price').val();
        let qty = $('#qty').val();
        let total = $('#total').val();
        let dis = $('#dis').val();
        let disper = $('#disper').val();
        let nettotal = $('#nettotal').val();

        let a = price * qty;
        $('#total').val(a);
        $('#nettotal').val(a);

        let b = total - dis;
        $('#nettotal').val(b);
        
        

        let c = (dis / total) *100;
        $('#disper').val(c);


        let d = total - nettotal;
        $('#dis').val(d);

        if (dis ! = 0 ) {
            nettotal = a;

        }else{
            nettotal = b;
        };
    };
    
});
*/
/*
let array = [2, 3,]

let x = array[0];
let y = array[1];
let a = array[2]
let z = x+y;
let b = z-a;
console.log(z);
*/