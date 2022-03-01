@include('theme.pages.Commercial.Invoice.__datatable.__with_options')

@each('theme.pages.Commercial.Invoice.__datatable.__payment_detail_modal',$invoices ,'invoice' )

@each('theme.pages.Commercial.Invoice.__datatable.__add_payment',$invoices ,'invoice' )
