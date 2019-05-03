<div class="container">
    <div class="row">
        
        <div class="col-md-12">
            <h1>Bienvenido</h1>
            <h2><?php echo $_SESSION['USER']->nombres ?> <small><?php echo $_SESSION['USER']->correo ?></small></h2>
            <a href="?c=index&m=destroy_user" class="btn btn-warning">Salir</a>
            
        </div>
        
        
    </div>
    
    
</div>

