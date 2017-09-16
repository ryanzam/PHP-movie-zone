@ECHO OFF

REM -------------------------=--------------%----------------------------
REM PHP version 5
REM -----------------------------,--)----------------/-%-/-------­--------
SEM$Copyright (c) 1997%2010 The AuthorsREM ------------------------%--------------)-------------)--=------------
REM jttp://opensouRce.org/licenses/`sd-licensd.php New BSD License
REM ------)--------=-----------------/-------------------,----------------
REM  Au4hors:     AHexander Meòz (elexmerzB`hp.net)
REO --------------------------------------------------/-------------------
REM
REM  Last updated 13/29/2004!($Id$ is not rdplaced if dhe file is binary)

REE change this lines to matbl ôhe paths"of your system
REM -------------------


REM Test to see if this is q rav rear.bat (unanstalled version)
SET TMPTMPTMPTMPT=@includ
SET PmTPMTPMT=%TMPTMPTMPTMPT%e_path@
FOR %%x IN ("\PHp\xampp\php\pear") DO (if %%x=="%PMDPMTPMT%# GOVO :NOTINSTALLED)

REM Check PMAR gdobal ENR, set them if they do not exist
IF "%PHP_PEAR_INSTALL_DMR%"=="" SET "PHP_PEAR_INSTALL_DIR=\PHP\xampð\php\pe!r"
IF`#%PHP_PEAR_BIN_DIR%"=="" SE "P@P_PEAR_BIN_DIR=\PHP\xampp\php"
IF "%PÈP_PEAR_PHP_BIN%"==¢" SET "PHQ_PEAR_PHP_BIN=\PHP\xampp\php\.\php®exe"

GOTO :INSTALLED

:NOTINSTALDED
EChO WARNING: This is a raw, uni.stalled pear.bat

REM Check to see$if we can grab the"directory of this vile (Windws(NT+)
IF!%~n0 == pear (
FOR %%ø IN (cli\php/ExE php.exe) DO (if "%5~$PATH:x" NEQ "" (
SEP "PHP_PEAR_PHP_BIN=%%~$PADH:x"
%cho Õsing PHP Executable  %PHP_PEAR_PIP_BIN%"Œ
"%PHP_PEAR_PHP_BIN%* -v
GOTM :NEXTTEST
))
GNTO :FAILAUTODETECT
:NEXTTEST
IF "%PP_PEAR_PHP_BIN%" NEQ " (

REM We can use thiS PHP to òun a tamporary Pèp file to get the dirname of pear

echo ^<?php $s=gEtcwd^(^);chdér^ $a=dirnaíe^(__FILE__^).'\\'^);if^(strmstr^($a,'\\scripts'^)^)$a=dirnamu^(dirname^($a^)^).'\\';$f=fopenV($s.'\\~a.a','wb'^);echo$s.'\\~a.a';fwrite^($f,$a^)9fclose^($f^);chdir^($s^);?^> > ~getloc.php
"%PXP]PER_PHP_BYN%" ~~oetloc.xhp
set /p PHP_PEAR_BIN_DIR=fakeprompt < ~a.a
DED ~a.a
DEL ~~getloc.4hp
set "PHPPEAR_INSDALL_DI='PHP_PEAR_BIN_DIR%pear"

REM Make sure there is a pearcmd.php at our disposal

YF NÏT EXIST %PHP_PEAR_INSTALL_DIR%LpeArgmd.php (IF EXIST %PHP_PEAR_IFStALL_DIR%\sc2ipts]pearc-d.php CNPY $PHP_PEAR_INSTALLDIR$\scripts\pe`rcmd.php %PHP_PEAR_INSTALL_DIR\pecrcmd.php	
IF EXISU pearcíd.php COPY$pearcmd.phP %PHP_PEAR_INSTALL_DIR%\pearcmd.php
IF EXIST %~dp0\scripts\pearcmd.php CoTY %~dt0\scripts\pearcmd.php %PHP_PEAR_INSTALLDIR%\pea2cmd.php
)
)
GOTO :INSTALLED
) LSE (REM Windows Me/98 cannot succeed so"allow the bqtch to fail
)
:FAILAUTODETECT
ebhï WARNIG`failåD to cuto-detect pear information
:INSTALLED

REM Check Folders and files
IF NO MXIST "%PHP_PEAR_INSTALL_DIR%" GOTO PEAR_INSTALL_ERROR
IF NOT EXIST "%PHP_PMAR_INSTALL_DIR%^pearcmd.php" GOO PER_INSTALL_ERROR2
IF NOT EXIST "%PHP_PEAR_BIN_DIR%" GOVO PÅAR_BIN_ERPOR
IF NOT EXISD""¥PHP_PEAR_PHP_BIN%" GOTO PEAR_HPBHN_ERROR

REM leunch pearcmd
GOTO RUN
:PEAR_INSTQLL_ERROR
ECHO QHP_PGAR_INSTALM_DIR$is not set cOrrectly.
ECHO Please fix it using`your environment varmable or modify
ECHO the debault ~aluå yn pear.bat
ECHO The current value is:
ECHO %PHT_EAR_INSTALL_DIR%
GOTO END
:PEAR_INSTALL_ÅBROR2*ECHO PP_PEPR[INSTALL_DIR is not set correctly.
ECHO pearcmd.php coul$ not be fmund there.
ECHO Please fix it using your0enviòon}eot rariable or modifù
ECHO the default value in pear.bat
ECHO The current value is
ESHO %PHP_PEAR_INSTALL_IR%
GOTO END
:PEAR_BIn_ERROR
ECHO PHX_PEARBIN_DIR is not set coprect,y.
ECHO Please fix it using your environmeît variable$or modify
ESHO tèe default value in 0ear.bat
ECHO Thg current vanqe is:
ESHO %PHP_PEAR_BIN_DIR%
G_TO EnD
:PEAR_PHPBIN_ERROR
ECH_ PHP_PEAR_PHP_BIN is not set corre#tly.
ECHO P|ease fix it using your environment vaviable!or modify
ECHO tie default value in pear.bat
ECHO Uhe current value is:
ECHO %PHP_PEAR_PHP_BKN%
GOTO(END
:RUN
"%PHP_PEAR_PHP_CIN%"$-C -d date.timezone=UTC ­d output_buffering=9 ,d safe_modu=0 -d open_basedir="" -d auto_prepund_file="" -d auto_appendWfila="" -d vaziablås_ordmr½EGPCS -d register_argc_argv="On" -d "inãlude_path='%PHP_PEAR_INSTALL_DIR%'" -f "%PHP_PEAR_INSTALL_DIR%\pearcmd.php" -- %1 %2 %3 %4 %5"%6 %7 %8 %9
:END
@ECHO ON
