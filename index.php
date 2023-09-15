<!DOCTYPE html>
<html>



<head>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='author' content='fortrainevolution.com'>
    <link rel='shortcut icon' href='./imagenes/logo6.png'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi' crossorigin='anonymous'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/hint.css/2.7.0/hint.min.css'>
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' integrity='sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf' crossorigin='anonymous'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css'>
    <link rel='stylesheet' href='./estilos.css' type='text/css'>
    <link rel="stylesheet" id="chessboard-css" href="./css/chessboard.css" />
    <link rel="stylesheet" href="./css/board.css" />
    <link href='https://fonts.cdnfonts.com/css/modern-age' rel='stylesheet'>
    <title>G.0.A.L ajedrez</title>
</head>

<body class="bg-warning">
    <div class="content">
    	<span align="center">
            <img  width="80" height="80" src="https://github.com/kikeEsponja/nuevo/blob/main/logo6.png?raw=true" style="display: block; margin-left: auto; margin-right: auto">
            <h1 align="center" style="font-weight:600; font-family:'Modern Age'">G.0.A.L v-2.6.0</h1>
            <h2 align="center" style="color:#ffffff">módulo de pruebas</h2>
            <br />
        </span>
        <div class="loader" id="loader"></div>
        <?php
            include "conex.php";
            if(isset($_POST['accion'])){
                $mensaje = "recarga la página";
            }else{
                $consulta = "SELECT estado FROM ajedrez WHERE ID='$ident[0]'";
                $resultado = mysqli_query($conn, $consulta);
                $fila = mysqli_fetch_assoc($resultado);
                $mensaje = $fila['estado'];
            }
        ?>
            <div class="chess-area">
                    <?php
                        /*if($ident){
                            echo "<h2>Todo va bien</h2>";
                        }*/
                    ?>
                <div class="board-table">
                    <div id="board-top-controls" class="top-controls">
                        <div id="game-promotion" class="promotion hidden">
                            <span figure="q">Reina</span>
                            <span figure="b">Alfil</span>
                            <span figure="n">Caballo</span>
                            <span figure="r">Torre</span>
                        </div>
                        <div id="board-save-pgn-area" class="popup hidden">
                            <span class="close"></span>
                            <label>Save PGN Notation:</label>
                            <textarea readonly></textarea>
                            <button>Cerrar</button>
                        </div>
                        <div id="board-load-fen-area" class="popup hidden">
                            <span class="close"></span>
                            <label>Load FEN Notation:</label>
                            <textarea></textarea>
                            <button>Cargar</button>
                        </div>
                        <div id="board-load-pgn-area" class="popup large hidden">
                            <span class="close"></span>
                            <label>Load PGN Notation:</label>
                            <textarea></textarea>
                            <button>Cargar</button>
                        </div>
                        <div id="board-resign-game-area" class="popup hidden">
                            <span class="close"></span>
                            <label>Te rindes?</label>
                            <button class="yes">Sí</button>
                            <button class="no">No</button>
                        </div>
                    </div>
                    <div id="board" class="board"></div>
                    <div id="board-controls" class="controls">
                        <div class="buttons">
                            <button id="btn-switch-sides" title="Switch Sides"><i class="icon"></i></button>
                            <button id="btn-flip-board" title="Flip Board"><i class="icon"></i></button>
                            <button id="btn-save-pgn" title="Save PGN"><i class="icon"></i></button>
                            <button id="btn-engine-disable" title="Engine Toggle (On/Off)">AI</button>
                            <button id="btn-show-hint" title="Show Hint"><i class="icon"></i></button>
                            <button id="btn-take-back" class="disabled" title="Take Back"><i class="icon"></i></button>
                        </div>
                        <div class="status">
                            <!-- <span id="game-timer" class="hidden">00:00</span> -->
                            <span id="game-turn" style="display: none;">Es tu turno!</span>
                            <span id="game-state" class="hidden"></span>
                        </div>
                        <div id="board-messages" class="messages hidden" style="display: none !important;"></div>
                    </div>
                </div>
                <div class="board-settings">
                    <div class="apex">
                        <span class="label-history">Historial</span>
                        <div class="game-level" id="game-difficulty-option" title="Choose The Engine's Skill Level">
                            <span class="label">Nivel</span>
                            <span class="value" id="game-difficulty-skill-value">10</span>
                        </div>
                    </div>
                    <div class="game-difficulty hidden" id="game-difficulty-skill-settings">
                        <span class="label">Selecciona el nivel del robot:</span>
                        <span class="close"></span>
                        <div class="values">
                            <span class="1">1</span>
                            <span class="2">2</span>
                            <span class="3">3</span>
                            <span class="4">4</span>
                            <span class="5">5</span>
                            <span class="6">6</span>
                            <span class="7">7</span>
                            <span class="8">8</span>
                            <span class="9">9</span>
                            <span class="10 selected">10</span>
                            <span class="11">11</span>
                            <span class="12">12</span>
                            <span class="13">13</span>
                            <span class="14">14</span>
                            <span class="15">15</span>
                            <span class="16">16</span>
                            <span class="17">17</span>
                            <span class="18">18</span>
                            <span class="19">19</span>
                            <span class="20">20</span>
                        </div>
                    </div>
                    <div class="turns-history" id="game-turns-history">
                        <ol></ol>
                    </div>
                    <div class="game-analyze hidden" id="game-analyze-string"></div>
                    <div class="game-menu hidden" id="game-settings">
                        <span class="label-choose-side">Selecciona bando</span>
                        <span class="btn game-white-side selected" id="btn-choose-white-side"></span>
                        <span class="btn game-black-side" id="btn-choose-black-side"></span>
                    </div>
                    <div class="tunes">
                        <span id="btn-new-game" title="Start New Game" class="btn-new-game">
            <span class="icon"></span>
                        <span class="label">Nuevo juego</span>
                        </span>
                        <span id="btn-settings" title="Choose The Engine's Skill Level" class="btn settings"></span>
                        <span id="btn-resign" title="Resign" class="btn resign"></span>
                        <span id="btn-analyze" title="Request Engine Evaluation" class="btn analyze">
            <i class="icon"></i>
          </span>
                    </div>
                    <div class="params">
                        <div class="cell side" id="game-player-side" style="display: none;">
                            <label>Tu bando:</label>
                            <span class="white active">Blanco</span>
                            <span class="black">Negro</span>
                        </div>
                        <div class="cell first-turn" id="game-first-turn" style="display: none;">
                            <label>First Turn:</label>
                            <span class="player active">jugador</span>
                            <span class="computer">AI</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="chess-log"></div>
    </div>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/chess.min.js"></script>
    <script src="js/ltpgnviewer.js"></script>

    <script>
        function is_touch_device() {
            return 'ontouchstart' in window || navigator.maxTouchPoints;
        };

        function loadCss(cssId, cssHref) {
            $('#' + cssId).attr('href', cssHref);
        }

        var mobileLibs = 8;
        var desktopLibs = 8;

        var isMobile = is_touch_device();

        if (isMobile == true) {

            var chess, board;

            loadCss('chessboard-css', 'css/caustique-chessboard.css');

            $.getScript('js/chessboard-caustique-min.js', initGameBoard('mobile'));
            $.getScript('js/board-controls-side.js', initGameBoard('mobile'));
            $.getScript('js/board-controls-bottom.js', initGameBoard('mobile'));
            $.getScript('js/board-sets.js', initGameBoard('mobile'));

            $.getScript('js/board-time.js', initGameBoard('mobile'));
            $.getScript('js/board-actions.js', initGameBoard('mobile'));
            $.getScript('js/board-actions-mobile.js', initGameBoard('mobile'));
            $.getScript('js/board-init.js', initGameBoard('mobile'));

        } else {

            loadCss('chessboard-css', 'css/chessboard.css');

            $.getScript('js/chessboard.min.js', initGameBoard('desktop'));
            $.getScript('js/board-controls-side.js', initGameBoard('desktop'));
            $.getScript('js/board-controls-bottom.js', initGameBoard('desktop'));
            $.getScript('js/board-sets.js', initGameBoard('desktop'));

            $.getScript('js/board-time.js', initGameBoard('desktop'));
            $.getScript('js/board-actions.js', initGameBoard('desktop'));
            $.getScript('js/board-actions-desktop.js', initGameBoard('desktop'));
            $.getScript('js/board-init.js', initGameBoard('desktop'));

        }

        function initGameBoard(lib = false) {

            if (lib == 'mobile') {
                mobileLibs--;
                if (mobileLibs == 0) {
                    console.log('Mobile loaded');
                    setTimeout(function() {
                        setMobileBoard();
                    }, 1000);
                }
            }

            if (lib == 'desktop') {
                desktopLibs--;
                if (desktopLibs == 0) {
                    console.log('Desktop loaded');
                    setTimeout(function() {
                        setDesktopBoard();
                    }, 1000);
                }
            }

        }
    </script>

</body>

</html>
