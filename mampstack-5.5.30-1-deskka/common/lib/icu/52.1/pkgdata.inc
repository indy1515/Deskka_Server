GENCCODE_ASSEMBLY_TYPE=-a gcc-darwin
SO=dylib
SOBJ=dylib
A=a
LIBPREFIX=lib
LIB_EXT_ORDER=.52.1.dylib
COMPILE=gcc -DU_ATTRIBUTE_DEPRECATED= -I/Applications/mampstack-5.5.30-1-deskka/common/include -I/bitnami/mampstack-osx-x64/output/sqlite/include -I/Applications/mampstack-5.5.30-1-deskka/common/include/sasl -I/Applications/mampstack-5.5.30-1-deskka/common/include -arch x86_64   -DU_HAVE_ATOMIC=0  -I/Applications/mampstack-5.5.30-1-deskka/common/include -arch x86_64 -std=c99 -Wall -pedantic -Wshadow -Wpointer-arith -Wmissing-prototypes -Wwrite-strings   -fno-common -c
LIBFLAGS=-I/Applications/mampstack-5.5.30-1-deskka/common/include  -dynamic
GENLIB=gcc -dynamiclib -dynamic -I/Applications/mampstack-5.5.30-1-deskka/common/include -arch x86_64 -std=c99 -Wall -pedantic -Wshadow -Wpointer-arith -Wmissing-prototypes -Wwrite-strings   -L/bitnami/mampstack-osx-x64/output/sqlite/lib -L/Applications/mampstack-5.5.30-1-deskka/common/lib -arch x86_64  
LDICUDTFLAGS=
LD_SONAME=-Wl,-compatibility_version -Wl,52 -Wl,-current_version -Wl,52.1 -install_name
RPATH_FLAGS=
BIR_LDFLAGS=
AR=ar
ARFLAGS=r -c
RANLIB=ranlib
INSTALL_CMD=/usr/bin/install -c
