 /**
 * Checkout_tmplt
 *
 * Checkout template
 *
 * @category        templates
 * @name            checkout_tmplt
 * @desctiption     Checkout template
 * @internal        @type 1
 * @internal        @lock_template 0
 * @internal        @modx_category Comba
 * @internal        @installset base
 */
 <!DOCTYPE html>
 <html {{html_lang}}>
 <head>
     <title>[*pagetitle*] | [(site_name)]</title>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="[*description*]">
     <meta name="robots" content="index,follow">
     <base href="[(site_url)][(__page_root)]">
     <style>
         input[type="radio"]:checked + label > span {
             display: block;
         }

         input[type="radio"] + label > span {
             display: none;
         }
     </style>
 </head>
 <body>
 <div class="wrapper">

     [[CombaHeader? &hide=`cart`]]

     <div class="container">
         <div class="row">
             <div class="col">
                 [!CombaHelper? &action=`read` &docTpl=`@FILE:/chunk_checkout` &docRowTpl=`@FILE:/chunk_checkout_spec_row` &docRowAltTpl=`@FILE:/chunk_checkout_spec_row_alt` &docRowOnDemandTpl=`@FILE:/chunk_checkout_spec_row_ondemand` &docEmptyTpl=`@FILE:/chunk_checkout_empty`!]
                 [*content*]
             </div>
         </div>
     </div>
 </div>

 [[CombaFooter]]

 </body>
 </html>