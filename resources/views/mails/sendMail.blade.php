<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
    }

    .container {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #94c12f;
    }

    @media (min-width: 1064px) {
        .box-mail {
            background-color: white;
            width: 50%;
            border-radius: 15px;
            padding: 25px;
        }
    }

    .box-mail {
        background-color: white;
        width: 70%;
        border-radius: 15px;
        padding: 25px;
    }

    .logos {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .logo {
        font-size: 2rem;
        line-height: 1.25rem;
    }

    #last {
        color: black;
    }

    .text {
        color: #94C12F;
        font-family: "Times New Roman", Times, serif;
    }

    .title {
        font-size: 1.3rem;
        line-height: 1.25rem;
        padding: 12px;
        background-color: #94c12f;
        color: white;
        border-radius: 10px;
    }

    .space-y-5> :not([hidden])~ :not([hidden]) {
        --tw-space-y-reverse: 0;
        margin-top: calc(1.25rem
                /* 20px */
                * calc(1 - var(--tw-space-y-reverse)));
        margin-bottom: calc(1.25rem
                /* 20px */
                * var(--tw-space-y-reverse));
    }

    .cheaf {
        font-size: 1rem;
        line-height: 0.25rem;
        color: white;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    .code {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    #email {
        color: blue;
        text-decoration-line: underline;
        cursor: pointer;
    }

    #first-para,
    #second-para {
        font-size: 1.2rem;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    .coding {
        margin-left: auto;
        margin-right: auto;
        font-size: 2rem;
        font-weight: 700;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    .last-test {
        font-family: 'Times New Roman', Times, serif;
    }
</style>

<body>
    <div class="container">
        <div class="box-mail space-y-5">
            <div class="logos">
                <div class="logo">
                    <span class="text">S</span><span id="last" class="text-white">CHMID</span>
                </div>
            </div>
            <div class="title">
                <span>code de validation</span>
            </div>
            <div class="cheaf">
                <p>cher utlisateur de schmid</p>
            </div>
            <div>
                <p id="first-para">Nous avons recu une demande d'acces a votre compte Schmid <a href="#"
                        id="email">{{ $user->email }}</a> envoye avec votre adresse e-mail, Votre code de
                    validation Schmid est:</p>
            </div>
            <div class="code">
                <span class="coding">{{ $code }}</span>
            </div>

            <div>
                <p id="second-para">Si vous n'avez pas demande a recevoir ce code, il est possible qu'un tiers essaie au
                    compte <a href="#" id="email">{{ $user->email }}</a>. <span class="last-test">Ne
                        transferez ce
                        code a un autre personne.</span></p>
            </div>
            <div>
                <p>Cordialement,</p>
            </div>
            <div>
                <p>L'equipe SCHMID</p>
            </div>
        </div>
    </div>
</body>

</html>
