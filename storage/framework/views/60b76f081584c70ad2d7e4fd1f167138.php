<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center">Criar Conta</h2>

        <div class="row justify-content-center">
            <div class="col-md-4">
                <form method="POST" action="<?php echo e(route('register.submit')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Criar Conta</button>
                    <p class="mt-2 text-center"><a href="<?php echo e(route('login')); ?>">Já tenho uma conta</a></p>
                </form>
            </div>
        </div>
    </div>

</body>
</html>

<?php /**PATH /var/www/resources/views/auth/register.blade.php ENDPATH**/ ?>