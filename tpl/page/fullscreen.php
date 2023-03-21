<!DOCTYPE html>
<html>
<head>
    <title><?=t('btn_mibbit') . ' ' . sitename()?></title>
    <style type="text/css">
        body, html, iframe, .gdt-mibbit-chat {
            width: 100%;
            height: 99.9%;
            overflow: hidden;
        }

        * {
            margin: 0;
            padding: 0;
            border: none;
            position: relative;
            box-sizing: border-box;
        }

    </style>
</head>
<body>
<?=$panel->render()?>
</body>
</html>
