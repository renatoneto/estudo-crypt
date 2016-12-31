<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crypt test</title>
</head>
<body>

    <form method="post" action="client.php" id="form">

        <input placeholder="Nome" name="data[name]" required />
        <input placeholder="Email" name="data[email]" required />

        <button type="submit">Enviar</button>

    </form>

    <div id="result" style="margin-top: 10px;"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript">

        var resultBox = $('#result');

        $('#form').submit(function(e) {
            e.preventDefault();

            resultBox.html('');

            var form = $(this);

            $.ajax({
                url: 'client.php',
                data: form.serialize(),
                method: 'post',
                success: function(response) {

                    resultBox.html(response);

                }
            });

        });

    </script>
</body>
</html>
