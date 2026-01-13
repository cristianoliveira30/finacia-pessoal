# Core — Aplicação Laravel

<p align="center">
  <a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="320" alt="Laravel Logo"></a>
</p>

**Descrição:** Projeto baseado em Laravel (v12) com Vite, TailwindCSS e componentes Flowbite. Este README descreve como configurar e executar o projeto localmente tanto com **Laravel Sail (Docker)** quanto sem Docker usando `npm run dev` + `php artisan serve`.

---

## 🧰 Stack principal

- **PHP** >= 8.2
- **Laravel** ^12
- **Laravel Sail** (Docker) para ambiente de desenvolvimento isolado
- **Node.js / npm** + **Vite** (dev server e build)
- **Tailwind CSS**, **Flowbite** e bibliotecas JS (ApexCharts, SweetAlert2, etc.)
- **Pest / PHPUnit** para testes
- **Composer** para dependências PHP

---

## 📦 Requisitos

- Para usar Laravel Sail (recomendado):
  - Docker e Docker Compose instalados
  - WSL ou ambiente linux
- Para rodar sem Sail:
  - PHP >= 8.3, Composer
  - Node.js (recomendado >= 16) e npm

---

## 🚀 Iniciando o projeto (opção A: com Laravel Sail)

1. Copie o arquivo de ambiente e ajuste variáveis conforme necessário:

```bash
cp .env.example .env
```

2. Suba os containers e execute instalação (usa o binário Sail):

```bash
# Inicia os containers em background
./vendor/bin/sail up -d

# (Opcional) instale dependências PHP dentro do container
./vendor/bin/sail composer install

# Gere a chave de app
./vendor/bin/sail artisan key:generate

# Rode migrations e seeders (se aplicável)
./vendor/bin/sail artisan migrate --seed

# Instale dependências JS e rode o dev server do Vite
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
```

3. Acesse a aplicação em `http://localhost` (ou na porta configurada pelo Sail).

Dica: Você pode adicionar um alias para facilitar os comandos no terminal (opcional):

```bash
alias sail='./vendor/bin/sail'
# Agora pode usar: sail up -d, sail artisan migrate, sail npm run dev, etc.
```

---

## ⚙️ Iniciando sem Docker (opção B: `npm run dev` + `php artisan serve`)

> Use esta opção se você preferir rodar os serviços localmente (PHP/Composer instalados no host).

1. Copie o .env e configure:

```bash
cp .env.example .env
```

2. Instale dependências PHP e JS:

```bash
composer install
npm install
```

3. Gere a chave de app e rode migrations:

```bash
php artisan key:generate
php artisan migrate --seed
```

4. Rode o Vite e o servidor PHP (em terminais separados):

```bash
# Terminal 1
npm run dev

# Terminal 2
php artisan serve --host=127.0.0.1 --port=8000
```

Abra `http://127.0.0.1:8000` no navegador. Se o Vite usar hot module replacement, acesse também a porta do Vite (tipicamente 5173) quando solicitado.

Observação: O `composer` do projeto já inclui um script `dev` que executa `php artisan serve`, `php artisan queue:listen` e `npm run dev` em paralelo (via `concurrently`) caso prefira uma abordagem centralizada:

```bash
composer dev
```

---

## 🧪 Testes

- Com Sail:

```bash
./vendor/bin/sail test
```

- Sem Sail:

```bash
php artisan test
# ou
composer test
```

---

## 🛠️ Comandos úteis

- Rodar migrations: `php artisan migrate`
- Rodar seeders: `php artisan db:seed`
- Criar link de storage: `php artisan storage:link`
- Limpar caches: `php artisan config:clear && php artisan route:clear && php artisan view:clear`
- Rodar fila: `php artisan queue:work` (ou `sail artisan queue:work` com Sail)
- Build para produção (assets): `npm run build`

---

## 🔧 Deploy / Produção (pontos rápidos)

- Execute `npm run build` para gerar os assets com Vite.
- Configure variáveis de ambiente (`APP_ENV=production`, `APP_DEBUG=false`, `APP_KEY` definida).
- Execute `php artisan migrate --force` em produção.
- Configure servidor web (Nginx/Apache) para apontar para a pasta `public/`.

---

## ⚠️ Troubleshooting (Problemas comuns)

- Problema: **Erros de porta/vite** — verifique se a porta do Vite (por padrão 5173) não está em uso.
- Problema: **Permissões em storage** — ajuste com `chown -R www-data:www-data storage bootstrap/cache` (ou conforme seu ambiente).
- Problema: **Containers inconsistentes** — reinicie com `./vendor/bin/sail down -v && ./vendor/bin/sail up -d`.

---

## 📄 Licença

Esse projeto está licenciado sob a **PrimeTech - Systems** — veja o arquivo `LICENSE` para detalhes.

---

