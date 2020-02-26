<!DOCTYPE html>
<html>
   <head>
      <meta name="viewport" content="width=device-width">
      <title>Blade Components and Slots</title>
      <meta name="description" content="">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
   </head>
   <body>
   <div class="container">
      @component('component/alert')
          @slot('class')
              alert-danger
           @endslot

           @slot('title')
            Error
            @endslot
            
           @slot('function')
            Error Function 
            @endslot
           
           Error Component
         @endcomponent

         @component('component/alert')
           @slot('class')
             alert-success
            @endslot
            
           @slot('function')
            Success Function 
            @endslot

            @slot('title')
              Success
            @endslot
            Success Component
          @endcomponent
      </div>
      {{hsize()}}
      {{human_file_size(1024)}}
   </body>
</html>