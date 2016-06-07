# NewsCMS

## Another CMS?!

Yes but this one has no goals to completely replace other CMS instead it has the goal of being simple yet extremely powerful. Although themeing is still supported plugins are not and there are no goals to support them in the future. The most powerful feature of NewsCMS is its real-time content capabilities. Getting news to the viewers faster than ever and with less page refreshes.
To top it off this CMS has integrations with the security api [Castle](https://castle.io).

## Compatibility

This CMS has been tested in the following:

- Nginx (latest)
- PHP 7.0
    - JSON Extension
    - PDO MySQL Extension
    - MBString Extension
    - MCrypt Extension
    - GD Extension (Not required)
- MySQL 5.7

This software is in now way guaranteed to work in any other environments however it should work with PHP 5.6 and possibly 5.5 as well has HHVM. It will however not work in 5.4 or lower as those versions lack the native `password_hash()` and `password_verify()` functions.

## Security Vulnerabilities

If you discover a security vulnerability within NewsCMS, please send an e-mail to Matthew Rhodes at [matthew@rhodes.ml](mailto:matthew@rhodes.ml). All security vulnerabilities will be promptly addressed.

## License

NewsCMS is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
