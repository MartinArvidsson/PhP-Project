<?php
class LayoutView 
{
  
  public function render($v) 
  {
    echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>PhP Project</title>
        </head>
        <body>
          <h1>Tic-Tac-Toe</h1>
          <div class="container">
              ' . $v->response() . '
          </div>
         </body>
      </html>
    ';
  }
}