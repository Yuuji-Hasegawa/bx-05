# bx-05

BX-05 開発用リポジトリです。

https://demo.bbns.jp/bx-05/

# 使い方

`git clone` 後、`mkdir app` のように WordPress 管理用のディレクトリを作成し、`cd app`で移動してから、wp-cli を利用して、`wp core download --locale=ja` コマンドを実行してください。

MAMP 等にインストールできたら、設定画面 → 一般内のサイト URL から`/app`を削除の上、`/app/index.php` をルートディレクトリへ移動させてください。末尾を `require __DIR__ . '/app/wp-blog-header.php';` のように編集後、再度管理画面でパーマリンクの更新を行なってください。

もし、app 以外を使用する場合は、.gitignore 内の記述等も併せて変更してください。
テーマのディレクトリ名を変更する場合も、.gitignore のテーマ名部分 `!/app/wp-content/themes/bx-05/` と開発用(\_dev)を書き換えてください。

sw.js 内の上から 3 行分も実際のサイトに合わせて変更してください。
manifest.json も適宜変更してください。

開発用ディレクトリは、`/app/wp-content/themes/bx-05_dev/`、WordPress テーマは、`/app/wp-content/themes/bx-05/` です。
開発用ディレクトリへ移動後、`pnpm install` を実行して、開発に必要なデータをインストールしてください。

`pnpm run start` で開発用サーバが立ち上がります。開発が完了したら、`pnpm run build` で minify 化した CSS ファイル、JS ファイルが
`/app/wp-content/themes/bx-05_dev/dist/css`、`/app/wp-content/themes/bx-05_dev/dist/js` へ出力されるので、
それぞれコピーの上、`/app/wp-content/themes/bx-05/css`、`/app/wp-content/themes/bx-05/js` へ移動してください。

img ディレクトリ、font ディレクトリの移動もお忘れなく。

固定ページの中身は全て、php の方で設定していますので、固定ページを新規作成の上、slug を合わせてご利用ください。
流し込みデータは、`/app/wp-content/themes/bx-05/lib/setting.json` 内を書き換えれば、メールフォーム内以外は書き換え可能です。

お問い合わせフォーム内のデータは、別途編集ください。

## wp-cli のインストール方法

https://wp-cli.org/ja/

## node.js のインストール方法

1.Windows の場合

https://qiita.com/maecho/items/ae71da38c88418b806ff

2.mac の場合

https://qiita.com/33yuki/items/bae442fa6314bd8f9d7a

## pnpm のインストール方法

https://pnpm.io/ja/installation

# 各コマンドについて

`pnpm install`後、開発用ディレクトリ内で有効になるコマンドです。

- `pnpm run start` 開発用サーバが立ち上がります。
- `pnpm run build` `dist/css`、`dist/js`へ minify 化した CSS、JS ファイルが生成されます。
- `pnpm run format` フォーマッターが走ります。
- `pnpm run imagemin` `src/img` 内の画像を最適化して、`dist/img`へ移動します。
- `pnpm run imagemin:gen` `dist/img` 内の jpg,png から同名の avif、webp ファイルを生成します。
- `pnpm run icon` `dist/icons/icon.png` を元に同じフォルダ内にリサイズアイコンを生成します。

## Scss

Sass/Scss を使用しています。Dart Sass を利用しています。

## ファイルのバンドル

rollup を使用しています。npm 内の css を利用する場合は適宜編集してください。
