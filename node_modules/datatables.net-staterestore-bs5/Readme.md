# StateRestore for DataTables with styling for [Bootstrap5](https://getbootstrap.com/)

This package contains a built distribution of the [StateRestore extension](https://datatables.net/extensions/staterestore) for [DataTables](https://datatables.net/) with styling for [Bootstrap5](https://getbootstrap.com/).

The StateRestore extension for DataTables builds on the `stateSave` option within DataTable's core. This allows users to save multiple different states and reload them at any time, not just at initialisation.


## Installation

### Browser

For inclusion of this library using a standard `<script>` tag, rather than using this package, it is recommended that you use the [DataTables download builder](//datatables.net/download) which can create CDN or locally hosted packages for you, will all dependencies satisfied.

### npm

```
npm install datatables.net-staterestore-bs5
```

ES3 Syntax
```
var $ = require( 'jquery' );
var dt = require( 'datatables.net-staterestore-bs5' )( window, $ );
```

ES6 Syntax
```
import 'datatables.net-staterestore-bs5'
```

### bower

```
bower install --save datatables.net-staterestore-bs5
```



## Documentation

Full documentation and examples for StateRestore can be found [on the website](https://datatables.net/extensions/staterestore).


## Bug / Support

Support for DataTables is available through the [DataTables forums](//datatables.net/forums) and [commercial support options](//datatables.net/support) are available.


### Contributing

If you are thinking of contributing code to DataTables, first of all, thank you! All fixes, patches and enhancements to DataTables are very warmly welcomed. This repository is a distribution repo, so patches and issues sent to this repo will not be accepted. Instead, please direct pull requests to the [DataTables/StateRestore](http://github.com/DataTables/StateRestore). For issues / bugs, please direct your questions to the [DataTables forums](//datatables.net/forums).


## License

This software is released under the [MIT license](//datatables.net/license). You are free to use, modify and distribute this software, but all copyright information must remain.

