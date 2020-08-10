<?php
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customização</title>

    <link rel="stylesheet" href="../bootstrap4.5.0/css/bootstrap.min.css" />
        
    <link rel="stylesheet" href="../css/main.css" />

    <link rel="stylesheet" href="../bootstrap4.5.0/css/bootstrap.min.css" />  

</head>
<body>
    <?php include "header.php"; ?>

    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h2>Customização</h2>
            </div>
        </div>
    </div>  

    <div class="container">
        <div class="row">
            <div class="col-sm-3 text-right vertAlign">
                <button type="button" class="btn btn-primary p-0 "  id="btnplus" onclick="more('ingNum')"><b>
                        <svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                            <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                        </svg>
                    </b>
                </button>
                    <!-- <button class="btn btn-primary" id="btnminus"><b>-</b></button> -->
                <button type="button" class="btn btn-primary p-0"onclick="less('ingNum')"><b>
                    <svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-dash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3.5 8a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                    </svg></b>
                </button>
            </div>
            <div class="col-sm-5 text-center vertAlign">
                <span class="inputshow" id="ingNum" class="borderGray">3</span>
            </div>
            <div class="col-sm-4 text-center vertAlign">
                <img class="card-img-bottom mb-2" src="../static/svg/segment/sobremesas.svg" height="110px" width="110px" alt="Card image cap">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-3 text-right vertAlign">
                <button type="button" class="btn btn-primary p-0 remover" id="btnplus">
                        <svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                            <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                        </svg>
                </button>
                    <!-- <button class="btn btn-primary" id="btnminus"><b>-</b></button> -->
                <button type="button" class="btn btn-primary p-0"onclick="less('ingNum2')"><b>
                    <svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-dash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3.5 8a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                    </svg></b>
                </button>
            </div>
            <div class="col-sm-5 text-center vertAlign">
                <span class="inputshow" id="ingNum2" class="borderGray">3</span>
            </div>
            <div class="col-sm-4 text-center vertAlign">
                <img class="card-img-bottom mb-2" src="../static/svg/segment/sobremesas.svg" height="110px" width="110px" alt="Card image cap">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-3 text-right vertAlign">
                <button type="button" class="btn btn-primary p-0"  id="btnplus" onclick="more('ingNum3')"><b>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                            <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                        </svg>
                    </b>
                </button>
                    <!-- <button class="btn btn-primary" id="btnminus"><b>-</b></button> -->
                <button type="button" class="btn btn-primary p-0"onclick="less('ingNum3')"><b>
                    <svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-dash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3.5 8a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                    </svg></b>
                </button>
            </div>
            <div class="col-sm-5 text-center vertAlign">
                <span class="inputshow" id="ingNum3" class="borderGray">3</span>
            </div>
            <div class="col-sm-4 text-center vertAlign">
                <img class="card-img-bottom mb-2" src="../static/svg/segment/sobremesas.svg" height="110px" width="110px" alt="Card image cap">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6 text-right px-1">
                <button type="button" class="btn btn-lg btn-info btn-style">Redefinir</button>
            </div>
            <div class="col-md-6 text-left px-1">
                <button type="button" class="btn btn-lg btn-success btn-style">Salvar</button>
            </div>
        </div>
    </div>

    <script src="../javascript/customizacao.js"></script>
    <?php include "footer.php"; ?>