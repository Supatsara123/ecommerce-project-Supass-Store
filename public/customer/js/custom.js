// input product quantity
$(document).ready(function() {
    // console.log("jQuery is loaded and ready.");

    $('.addToCartBtn').click(function (e) {
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();

        // alert(product_id);
        // alert(product_qty);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/customer/personal/add-to-cart",
            data: {
                'product_id' : product_id,
                'product_qty' : product_qty,
            },
            success: function (response) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "bottom-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                    });
                    Toast.fire({
                    // icon: "warning",
                    title: response.status,
                    customClass: {
                        popup: 'borderless-toast'
                    }
                });
            }
        });
    });

    $('.increment-btn').click(function(e) {
        e.preventDefault();

        var qtyInput = $(this).closest('.product_data').find('.qty-input');
        var value = parseInt(qtyInput.val(), 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10)
        {
            value++;
            qtyInput.val(value);
        }
    });

    // $('.decrement-btn').click(function(e) {
    //     e.preventDefault();

    //     var qtyInput = $(this).closest('.product_data').find('.qty-input');
    //     var value = parseInt(qtyInput.val(), 10);
    //     value = isNaN(value) ? 0 : value;
    //     if (value > 1)
    //     {
    //         value--;
    //         qtyInput.val(value);
    //     }
    // });

    // Decrement quantity and confirm delete if value is 0

    $('.decrement-btn').click(function(e) {
        e.preventDefault();

        var qtyInput = $(this).closest('.product_data').find('.qty-input');
        var value = parseInt(qtyInput.val(), 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1)
        {
            value--;
            qtyInput.val(value);
            qtyInput.val(value - 1);
        }
        else if (value === 1) {
            var prod_id = $(this).closest('.product_data').find('.prod_id').val();
            Swal.fire({
                html: '<b>Do you want to remove the selected item?</b>',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "POST",
                        url: "/customer/personal/delete-cart-item",
                        data: {
                            'prod_id': prod_id
                        },
                        success: function (response) {
                            window.location.reload();
                            Swal.fire({
                                title: response.status,
                                icon: "success",
                                timer: 3000,
                            });
                        },
                        error: function (xhr, status, error) {
                            Swal.fire({
                                title: "Error",
                                text: "Something went wrong! Please try again.",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        }
    });

    $('.delete-cart-item').click(function (e) {
        e.preventDefault();

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();

        Swal.fire({
            // html: '<b>Do you want to remove the selected item?</b>',
            title :"Remove Products?",
            text: "Are you sure you want to remove these products from your cart?",
            // icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/customer/personal/delete-cart-item",
                    data: {
                        'prod_id': prod_id
                    },
                    success: function (response) {
                        window.location.reload();
                        Swal.fire({
                            title: response.status,
                            icon: "success"
                        });
                    },
                    error: function (xhr, status, error) {
                        Swal.fire({
                            title: "Error",
                            text: "Something went wrong! Please try again.",
                            icon: "error"
                        });
                    }
                });
            }
        });
    });

    $('.changeQuantity').click(function (e) {
        e.preventDefault();

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty = $(this).closest('.product_data').find('.qty-input').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        data = {
            'prod_id' : prod_id,
            'prod_qty' : qty,
        }

        $.ajax({
            method: "POST",
            url: "/customer/personal/update-cart",
            data: data,
            success: function (response) {
                // alert(response)
                window.location.reload();
            }
        });
    });
});
