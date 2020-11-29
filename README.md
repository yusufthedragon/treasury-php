# Treasury API Client for PHP

Unofficial PHP wrapper/library for access [Treasury API](https://www.treasury.id/).

- [Installation](#installation)
  - [Install the Package](#install-the-package)
  - [Set to Production Mode](#set-to-production-mode)
- [Usages and Examples](#usages-and-examples)
  - [Authentication](#authentication)
    - [Login Client Credentials](#login-client-credentials)
    - [Register New User](#register-new-user)
    - [Login](#login)
    - [Forgot Password](#forgot-password)
  - [Transaction](#transaction)
    - [Get Gold Price](#get-gold-price)
    - [Calculate Gold Amount](#calculate-gold-amount)
    - [Get Available Payment Methods](#get-available-payment-methods)
    - [Buy Gold](#buy-gold)
    - [Sell Gold](#sell-gold)
    - [Use Voucher](#use-voucher)
    - [Notify Payment](#notify-payment)
    - [Get Available Banks](#get-available-banks)
  - [Minting](#minting)
    - [Get Minting Partner](#get-minting-partner)
    - [Get Minting Fee](#get-minting-fee)
    - [Get Minting Piece](#get-minting-piece)
    - [Get Minting Shipping](#get-minting-shipping)
    - [Calculate Gold Minting](#calculate-gold-minting)
    - [Minting Gold](#minting-gold)
  - [Profile](#profile)
    - [Get Profile](#get-profile)
    - [Update Profile](#update-profile)
    - [Update Password](#update-password)
  - [History](#history)
    - [Get Transaction History](#get-transaction-history)
    - [Get Detail Transaction History](#get-detail-transaction-history)
- [Contributing](#contributing)

---

## Installation

### Install the Package

Install treasury-php with composer by following command:

```bash
composer require yusufthedragon/treasury-php
```

or add it manually in your `composer.json` file.

### Set to Production Mode

When deploying your application to production, you may want to change API Endpoint to production as well by setting `setProductionMode` to `true`.

```php
\YusufTheDragon\Treasury\Treasury::setProductionMode(true);
```

## Usages and Examples

### Authentication

#### Login Client Credentials

```php
\YusufTheDragon\Treasury\Auth::loginClient(array $params);
```

Usage example:

```php
$params = [
    'client_id' => '115823',
    'client_secret' => 'masdh12km3bf09dbkjlm13bkcsv0asdb1249gss2',
    'grant_type' => 'client_credentials'
];

$loginClient = \YusufTheDragon\Treasury\Auth::loginClient($params);

var_dump($loginClient);
```

#### Register New User

```php
\YusufTheDragon\Treasury\Auth::register(array $params);
```

Usage example:

```php
$params = [
    'name' => 'John Doe',
    'email' => 'john@doe.com',
    'password' => 'PassWord',
    'password_confirmation' => 'PassWord',
    'gender' => 'Male',
    'birthday' => '1990-01-01',
    'referral_code' => 'TRSRFRL',
    'phone' => '089612345678',
    'security_question' => 'KQxz9YXazA14VEO',
    'security_question_answer' => 'Dr. Seuss',
    'selfie_scan' => '/9j/4AAQSkZJRgABAQAAAQAB...',
    'id_card_scan' => '/9j/4AAQSkZJRgABAQAAAQAB...',
    'owner_name' => 'John Doe',
    'account_number' => ' 772661553',
    'bank_code' => 'BCA',
    'branch' => 'Jakarta',
    'customer_concern' => true,
    'app_notification' => true,
    'email_notification' => true
];

$register = \YusufTheDragon\Treasury\Auth::register($params);

var_dump($register);
```

#### Login

```php
\YusufTheDragon\Treasury\Auth::login(array $params);
```

Usage example:

```php
$params = [
    'client_id' => '115823',
    'client_secret' => 'masdh12km3bf09dbkjlm13bkcsv0asdb1249gss2',
    'grant_type' => 'password',
    'email' => 'john@doe.com',
    'password' => 'JohnDoe'
];

$login = \YusufTheDragon\Treasury\Auth::login($params);

var_dump($login);
```

#### Forgot Password

```php
\YusufTheDragon\Treasury\Auth::forgotPassword(string $email);
```

Usage example:

```php
$forgotPassword = \YusufTheDragon\Treasury\Auth::forgotPassword('john@doe.com');

var_dump($forgotPassword);
```

### Transaction

#### Get Gold Price

```php
\YusufTheDragon\Treasury\Transaction::getGoldPrice(string $bearerToken, array $params);
```

Usage example:

```php
$bearerToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoiYWRtaW4iLCJpYXQiOjE0MjI3Nzk2Mzh9.gzSraSYS8EXBxLN_oWnFSRgCzcmJmMjLiuyu5CSpyHI';
$params = [
    'start_date' => '2020-01-01 00:00:00',
    'end_date' => '2020-01-02 00:00:00',
    'type' => 'daily'
];

$getGoldPrice = \YusufTheDragon\Treasury\Transaction::getGoldPrice($bearerToken, $params);

var_dump($getGoldPrice);
```

#### Calculate Gold Amount

```php
\YusufTheDragon\Treasury\Transaction::calculate(string $bearerToken, array $params);
```

Usage example:

```php
$bearerToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoiYWRtaW4iLCJpYXQiOjE0MjI3Nzk2Mzh9.gzSraSYS8EXBxLN_oWnFSRgCzcmJmMjLiuyu5CSpyHI';
$params = [
    'amount_type' => 'currency',
    'amount' => 20000,
    'transaction_type' => 'buy',
    'payment_type' => 'nett',
    'payment_method' => 'bca'
];

$calculate = \YusufTheDragon\Treasury\Transaction::calculate($bearerToken, $params);

var_dump($calculate);
```

#### Get Available Payment Methods

```php
\YusufTheDragon\Treasury\Transaction::getPaymentMethod(string $bearerToken);
```

Usage example:

```php
$bearerToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoiYWRtaW4iLCJpYXQiOjE0MjI3Nzk2Mzh9.gzSraSYS8EXBxLN_oWnFSRgCzcmJmMjLiuyu5CSpyHI';

$getPaymentMethod = \YusufTheDragon\Treasury\Transaction::getPaymentMethod($bearerToken);

var_dump($getPaymentMethod);
```

#### Buy Gold

```php
\YusufTheDragon\Treasury\Transaction::buy(string $bearerToken, array $params);
```

Usage example:

```php
$bearerToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoiYWRtaW4iLCJpYXQiOjE0MjI3Nzk2Mzh9.gzSraSYS8EXBxLN_oWnFSRgCzcmJmMjLiuyu5CSpyHI';
$params = [
    'invoice_number' => 'TRS987654321',
    'unit' => 1.525,
    'total' => 981725,
    'payment_method' => 'treasury',
    'payment_channel' => 'BRIN',
    'latitude' => '-6.3853366',
    'longitude' => '106.8473377'
];

$buy = \YusufTheDragon\Treasury\Transaction::buy($bearerToken, $params);

var_dump($buy);
```

#### Sell Gold

```php
\YusufTheDragon\Treasury\Transaction::sell(string $bearerToken, array $params);
```

Usage example:

```php
$bearerToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoiYWRtaW4iLCJpYXQiOjE0MjI3Nzk2Mzh9.gzSraSYS8EXBxLN_oWnFSRgCzcmJmMjLiuyu5CSpyHI';
$params = [
    'total' => 981725,
    'unit' => 1.525,
    'latitude' => '-6.3853366',
    'longitude' => '106.8473377'
];

$sell = \YusufTheDragon\Treasury\Transaction::sell($bearerToken, $params);

var_dump($sell);
```

#### Use Voucher

```php
\YusufTheDragon\Treasury\Transaction::useVoucher(string $bearerToken, string $code);
```

Usage example:

```php
$bearerToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoiYWRtaW4iLCJpYXQiOjE0MjI3Nzk2Mzh9.gzSraSYS8EXBxLN_oWnFSRgCzcmJmMjLiuyu5CSpyHI';
$code = 'TRSwpL';

$useVoucher = \YusufTheDragon\Treasury\Transaction::useVoucher($bearerToken, $code);

var_dump($useVoucher);
```

#### Notify Payment

```php
\YusufTheDragon\Treasury\Transaction::notify(string $bearerToken, string $invoiceNumber, string $paymentNote);
```

Usage example:

```php
$bearerToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoiYWRtaW4iLCJpYXQiOjE0MjI3Nzk2Mzh9.gzSraSYS8EXBxLN_oWnFSRgCzcmJmMjLiuyu5CSpyHI';
$invoiceNumber = 'PNT0001',
$paymentNote = 'BCA'

$notify = \YusufTheDragon\Treasury\Transaction::notify($bearerToken, $invoiceNumber, $paymentNote);

var_dump($notify);
```

#### Get Available Banks

```php
\YusufTheDragon\Treasury\Transaction::getBankList();
```

Usage example:

```php
$getBankList = \YusufTheDragon\Treasury\Transaction::getBankList();

var_dump($getBankList);
```

### Minting

#### Get Minting Partner

```php
\YusufTheDragon\Treasury\Minting::getMintingPartner(string $bearerToken);
```

Usage example:

```php
$bearerToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoiYWRtaW4iLCJpYXQiOjE0MjI3Nzk2Mzh9.gzSraSYS8EXBxLN_oWnFSRgCzcmJmMjLiuyu5CSpyHI';

$getMintingPartner = \YusufTheDragon\Treasury\Minting::getMintingPartner($bearerToken);

var_dump($getMintingPartner);
```

#### Get Minting Fee

```php
\YusufTheDragon\Treasury\Minting::getMintingFee(string $bearerToken, string $mintingPartner);
```

Usage example:

```php
$bearerToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoiYWRtaW4iLCJpYXQiOjE0MjI3Nzk2Mzh9.gzSraSYS8EXBxLN_oWnFSRgCzcmJmMjLiuyu5CSpyHI';
$mintingPartner = 'x6A3lOoJXL59zDd';

$getMintingFee = \YusufTheDragon\Treasury\Minting::getMintingFee($bearerToken, $mintingPartner);

var_dump($getMintingFee);
```

#### Get Minting Piece

```php
\YusufTheDragon\Treasury\Minting::getMintingPiece(string $bearerToken, string $mintingPartner);
```

Usage example:

```php
$bearerToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoiYWRtaW4iLCJpYXQiOjE0MjI3Nzk2Mzh9.gzSraSYS8EXBxLN_oWnFSRgCzcmJmMjLiuyu5CSpyHI';
$mintingPartner = 'x6A3lOoJXL59zDd';

$getMintingPiece = \YusufTheDragon\Treasury\Minting::getMintingPiece($bearerToken, $mintingPartner);

var_dump($getMintingPiece);
```

#### Get Minting Shipping

```php
\YusufTheDragon\Treasury\Minting::getMintingShipping(string $bearerToken, string $mintingPartner);
```

Usage example:

```php
$bearerToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoiYWRtaW4iLCJpYXQiOjE0MjI3Nzk2Mzh9.gzSraSYS8EXBxLN_oWnFSRgCzcmJmMjLiuyu5CSpyHI';
$mintingPartner = 'x6A3lOoJXL59zDd';

$getMintingShipping = \YusufTheDragon\Treasury\Minting::getMintingShipping($bearerToken, $mintingPartner);

var_dump($getMintingShipping);
```

#### Calculate Gold Minting

```php
\YusufTheDragon\Treasury\Minting::calculate(string $bearerToken, array $params);
```

Usage example:

```php
$bearerToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoiYWRtaW4iLCJpYXQiOjE0MjI3Nzk2Mzh9.gzSraSYS8EXBxLN_oWnFSRgCzcmJmMjLiuyu5CSpyHI';
$params = [
    'minting_partner' => 'x6A3lOoJXL59zDd',
    'minting_fee' => '6ynW4Kp6dX8zNgq',
    'minting_piece' => 'KQxz9YXazA14VEO',
    'minting_shipping' => 'zQdmLYAkGAgoN2D'
];

$calculate = \YusufTheDragon\Treasury\Minting::calculate($bearerToken, $params);

var_dump($calculate);
```

#### Minting Gold

```php
\YusufTheDragon\Treasury\Minting::minting(string $bearerToken, array $params);
```

Usage example:

```php
$bearerToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoiYWRtaW4iLCJpYXQiOjE0MjI3Nzk2Mzh9.gzSraSYS8EXBxLN_oWnFSRgCzcmJmMjLiuyu5CSpyHI';
$params = [
    'minting_partner' => 'x6A3lOoJXL59zDd',
    'minting_fee' => 'JGYPjrXW7XDw2mE',
    'minting_piece' => 'KQxz9YXazA14VEO',
    'minting_shipping' => 'zQdmLYAkGAgoN2D',
    'shipping_address' => 'Custom Address',
    'payment_method' => 'partner',
    'payment_channel' => 'BRIN',
    'latitude' => '-6.3853366',
    'longitude' => '106.8473377'
];

$minting = \YusufTheDragon\Treasury\Minting::minting($bearerToken, $params);

var_dump($minting);
```

### Profile

#### Get Profile

```php
\YusufTheDragon\Treasury\Profile::getProfile(string $bearerToken);
```

Usage example:

```php
$bearerToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoiYWRtaW4iLCJpYXQiOjE0MjI3Nzk2Mzh9.gzSraSYS8EXBxLN_oWnFSRgCzcmJmMjLiuyu5CSpyHI';

$getProfile = \YusufTheDragon\Treasury\Profile::getProfile($bearerToken);

var_dump($getProfile);
```

#### Update Profile

```php
\YusufTheDragon\Treasury\Profile::updateProfile(string $bearerToken);
```

Usage example:

```php
$bearerToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoiYWRtaW4iLCJpYXQiOjE0MjI3Nzk2Mzh9.gzSraSYS8EXBxLN_oWnFSRgCzcmJmMjLiuyu5CSpyHI';

$updateProfile = \YusufTheDragon\Treasury\Profile::updateProfile($bearerToken);

var_dump($updateProfile);
```

#### Update Password

```php
\YusufTheDragon\Treasury\Profile::updatePassword(string $bearerToken, array $params);
```

Usage example:

```php
$bearerToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoiYWRtaW4iLCJpYXQiOjE0MjI3Nzk2Mzh9.gzSraSYS8EXBxLN_oWnFSRgCzcmJmMjLiuyu5CSpyHI';
$params = [
    'email' => 'john@doe.com',
    'password' => 'PassWord',
    'password_confirmation' => 'PassWord',
    'pin' => '123456'
];

$updatePassword = \YusufTheDragon\Treasury\Profile::updatePassword($bearerToken);

var_dump($updatePassword);
```

### History

#### Get Transaction History

```php
\YusufTheDragon\Treasury\History::getTransactionHistory(string $bearerToken, string $type);
```

Usage example:

```php
$bearerToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoiYWRtaW4iLCJpYXQiOjE0MjI3Nzk2Mzh9.gzSraSYS8EXBxLN_oWnFSRgCzcmJmMjLiuyu5CSpyHI';
$type = 'buy';

$getTransactionHistory = \YusufTheDragon\Treasury\History::getTransactionHistory($bearerToken, $type);

var_dump($getTransactionHistory);
```

#### Get Detail Transaction History

```php
\YusufTheDragon\Treasury\History::getTransactionDetail(string $bearerToken, string $type, string $invoiceNo);
```

Usage example:

```php
$bearerToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dnZWRJbkFzIjoiYWRtaW4iLCJpYXQiOjE0MjI3Nzk2Mzh9.gzSraSYS8EXBxLN_oWnFSRgCzcmJmMjLiuyu5CSpyHI';
$type = 'buy';
$invoiceNo = 'TRS64065803';

$getTransactionDetail = \YusufTheDragon\Treasury\History::getTransactionDetail($bearerToken, $type, $invoiceNo);

var_dump($getTransactionDetail);
```

## License

This library is open-sourced software licensed under the [GPL-3.0-only License](https://opensource.org/licenses/gpl-3.0.html).

## Contributing

For any requests, bugs, or comments, please open an [issue](https://github.com/yusufthedragon/treasury-php/issues) or [submit a pull request](https://github.com/yusufthedragon/treasury-php/pulls).
