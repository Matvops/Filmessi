<div style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; padding: 30px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
    <h2 style="color: #343a40;">Olá, {{ $name }}!</h2>

    <p style="font-size: 16px; color: #495057;">
        Obrigado por se cadastrar em nosso sistema. Para concluir seu registro, por favor confirme seu endereço de e-mail 
        clicando no botão abaixo:
    </p>

    <div style="text-align: center; margin: 30px 0;">
        <a href="{{ $link }}" style="background-color: #007bff; color: white; padding: 12px 20px; text-decoration: none; border-radius: 5px; display: inline-block;">
            Confirmar E-mail
        </a>
    </div>

    <p style="font-size: 14px; color: #6c757d;">
        Se você não realizou esse cadastro, por favor ignore este e-mail.
    </p>

    <p style="font-size: 14px; color: #6c757d;">
        Atenciosamente,<br>
        Equipe Filmessi
    </p>

</div>