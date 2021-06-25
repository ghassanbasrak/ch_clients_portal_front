<script>
    $('#chooseServices').on('change', function() {
        var id = this.value;
        var name = $(this).find("option:selected").text();
        var price = $(this).find("option:selected").attr('data-price')
        $(this).find("option:selected").remove();
        $('#none').prop('selected', 'selected')
        $('#items').append('<div id="item-'+id+'" class="form-group row">' +
            '<div class="input-group row">' +
            '<label for="'+name+'" class="mr-5">'+name+':</label>'+
            '<div class="input-group-prepend"><span class="input-group-text">$</span></div>' +
            '<input type="hidden" name="service['+id+'][id]" value="'+id+'" >' +
            '<input class="form-control" onchange="calculate()" type="number" value="'+price+'" name="service['+id+'][price]">' +
            '<button type="button" onclick="removeItem(\''+id+'\', \''+name+'\', \''+price+'\')" class="btn ml-5 btn-sm btn-danger">remove</button> ' +
            '</div></div>'
        );
        calculate();
    });
    function removeItem(id, name, price)
    {
        var option = new Option(name, id)
        option.setAttribute('data-price', price)
        $('#chooseServices').append(option)
        $('#item-'+id).remove();
        calculate();
    }
    function calculate()
    {
        var sub_total_selector = $('#sub_total');

        var total_selector = $('#total');

        var discount_selector = $('#discount');

        var sub = 0;
        $('#items input[type=number]').each(function () {
            if(!isNaN(this.value)) {
                sub = parseInt(this.value) + sub;
            }
        })
        sub_total_selector.val(parseInt(sub));
        total_selector.val(parseInt(sub) - parseInt(discount_selector.val()));
    }
    // function calc(id, price)
    // {
    //     var checked =($('[name="service['+ id +'][id]"]').prop('checked'));
    //     price = ($('[name="service['+ id +'][price]"]').val())
    //
    //     var sub_total_selector
    //     var old_sub_total
    //     var sub_total
    //     var total_selector
    //     var discount
    //     var total
    //
    //     if(checked)
    //     {
    //         sub_total_selector = $('#sub_total');
    //         old_sub_total = sub_total_selector.val();
    //         sub_total = parseInt(old_sub_total) + parseInt(price);
    //     }
    //     else
    //     {
    //         sub_total_selector = $('#sub_total');
    //         old_sub_total = sub_total_selector.val();
    //         sub_total = parseInt(old_sub_total) - parseInt(price);
    //     }
    //
    //      total_selector = $('#total');
    //      discount = $('#discount').val();
    //      total = parseInt(sub_total) - parseInt(discount);
    //
    //     sub_total_selector.val(sub_total)
    //     total_selector.val(total)
    // }
    //
    // $( "#discount" ).change(function() {
    //     var discount = $('#discount').val();
    //
    //     var sub_total = $('#sub_total').val();
    //     $('#total').val(parseInt(sub_total) - parseInt(discount));
    // });
</script>