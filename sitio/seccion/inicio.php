<section id="inicio">
    <div class="parallax_inicio">
    </div>

    <h1 class="container pt-4 pb-3 text-center">Librería A5</h1>
    
        <div id="fondoNosotros">
            <div class="container text-center">
                <p id="pNosotros">Librería A5 nació en los primeros días de octubre de 2021 como un emprendimiento familiar, antes de su apertura se imaginaba que clase de librería se iba a apuntar, ya que hay de distintos tipos pero se llegó al acuerdo de que sea escolar, comercial y artística. Está atendida por sus dueños y cuenta con una muy diversida variedad de productos con los mejores precios.</p>
            </div>
            
        </div>

    <div class="container">
        <h2 class="text-center mt-5 mb-4">Nuestros productos</h2>
        <ul class="list-group">
            <div class="row">
                <?php
                    foreach($cards as $card => $info):
                ?>
                    <li class="col-12 col-md-4 text-center">
                        <div id="cartas">
                            <img src="img/cards/<?=$info["imagen"]?>" alt="<?=$card?>">
                                <h3 class="card-title" id="tituloCarta"><?=$card?></h3>
                                <p class="card-text"><?=$info["descripcion"]?></p>
                        </div>
                    </li>
                <?php
                    endforeach;
                ?>
            </div>
        </ul>
    </div>
    
    <div class="parallax">
    </div>

    <div class="container">
        <h2 class="text-center pt-1 pb-3">Nuestros servicios</h2>
            <ul>
                <div class="row">
                    <?php
                        foreach($icons as $icon):
                    ?>
                        <li class="icons col-12 col-sm-4 text-center mb-2">
                            <img src="img/icons/<?=$icon[1]?>" alt="<?=$icon[0]?>">
                            <p class="mt-2"><?=$icon[0]?></p>
                        </li>
                    <?php
                        endforeach;
                    ?>
                </div>
            </ul>
    </div>

</section>