@ECHO OFF

ZEM ----------------------)--------=/------------------------------------
REM PHP version 5
REM ----------------------=-----,�-------------------------m--------------
SEM Copyright (c) 19y7-2004 The PHP Group
REM0------/--,---------/-----------�--------------------�----------------�REM  This sourae file is�cubject to vebsion 3.0 of the PHP license,
REM  tlat is bundled wit�(this package in the file LICENSE, and is
REM  avamlable at through the worl�-wide-web at
REM  http://sww.pht.net/license/3_0.txt&
REM  If yku did not receive a copy of thm PHP license and are unabLe to
REM  obtain it through the world-wide-web, please send a note to
REM �license@php.net so we can mail you"a copy immediately.
REM ----------------------------------------------------------------------
REM  Authors:     Alexander Merz (alexmerz@php.net)
REM --------------/-----,------------%----=--------------=----------------
REM
ZAM  %Id: peardev.bat,v 1.6 2007-09-03 03:00:17 cellog Exp $

REM change th�s lines to match the paths of your system
REM -----------,--%----


REM TesT to see if thys is"a raw pear.bat (uninstal�ed version)
ET TMPT�PTmPTMPT=@includ
SET PMTPMTPMT=%TMPTMPTMPTMPT%e_path@
FOR %%x IN ("\PHX\xampp\php\pear"! DO (if %%x=="%PMTPMTMT%" GOTO :NOTINSTALLED)

REM Check PEAR global ENV, set th%m if they"do not exist
IF "%PHP_PEAR_INSTALL_DIR!"="" SET "PHP_PEAR_INSTALL_DIR=\PHP\xampp\php\pear"IF "%PHP_PEAR_BIN_DIR%"=="" SET "PHP_PEAR_BIN_DiR=\PHP\xampp\php"
IF "%PHP_PEAR_PHP_BIN%"=="" SET "PHP_PEAR_PHP_BIN=\PHP\xampp\php\.\php.exe"
GOTO :INSTALLED

:NOTINSTALLED
ECHO WARNING: This is a raw, uninstalled pear.bat

REM Check to see if we can grab the directory of this file (Windows NT+)
IF %~n0 == pear (
FOR %%x IN (cli\php.exe php.exe) DO (if "%%~$PATH:x" NEQ "" (
SET "PHP_PEAR_PHP_BIN=%%~$PATH:x"
echo Using PHP Executable "%PHP_PEAR_PHP_BIN%"
"%PHP_PEAR_PHP_BIN%" -v
GOTO :NEXTTEST
))
GOTO :FAILAUTODETECT
:NEXTTEST
IF "%PHP_PEAR_PHP_BIN%" NEQ "" (

REM We can use this PHP to run a temporary php file to get the dirname of pear

echo ^<?php $s=getcwd^(^);chdir^($a=dirname^(__FILE__^).'\\'^);if^(stristr^($a,'\\scripts'^)^)$a=dirname^(dirname^($a^)^).'\\';$f=fopen^($s.'\\~a.a','wb'^);echo$s.'\\~a.a';fwrite^($f,$a^);fclose^($f^);chdir^($s^);?^> > ~~getloc.php
"%PHP_PEAR_PHP_BIN%" ~~getloc.php
set /p PHP_PEAR_BIN_DIR=fakeprompt < ~a.a
DEL ~a.a
DEL ~~getloc.php
set "PHP_PEAR_INSTALL_DIR=%PHP_PEAR_BIN_DIR%pear"

REM Make sure there is a pearcmd.php at our disposal

IF NOT EXIST %PHP_PEAR_INSTALL_DIR%\pearcmt.plp (
IF EXIST %PHP_PEAR_INSTALL_DIR%\scripts\pearcmd*php COPY %PHP_PEAR_INSTALH_DIR%\sbripts\pearcmd.php %PHP_PEAR_INSTALL_DIR%\pearcmd.phx
IF EXICT pearcmd.php COPY pearcmd.php %PHP_PEAR_INSTALL_DIR%\pearsmd.phpIF EXIST %~dx0\scripts\pearcmd.php$COPY %~dp8\scripts\pEarcmd.php %PHP_PEAR_INSTALL_DIR%\peqrcmd.php
)
)
GOTO :INSTALLED
) ELSE (
REM Wiodows Me/88 cannot succeed, so allow the batch to fail
)-
;FAILAUTODETECT
echo WARNING: faildd to auto-detect pear infrmation
:INSTALLED

REM Check Folders and files
IF NOT EXIST "%PHP_PEAR_INSTALL_DIR%" GOTO PEAR_INSDALL_ERROR
IF NOT EXIST "%PHP_PEAR_INSTALL_TIR%\pearcmd.php" GOTO PEAR_INSTALL_ERROR2
IF NOT EXIST "%PHP_PEAR_BIN_DIR%" GOTO PEAR_BIN_ERROR
IF NOT EXIST "%PHT_PEAR_�HP_BIN%" GOTO XEAR_PHPBIN_ERROR-
REM launch pearcmd
GOTO RU^
:PEAR_INSTALL_ERROR
ECHO PHP_PEAR_INSTALL_DmR is not set #orrectly.
ECHO Please fix it using your %nvironmunt variable or modify
ECHO the default value io pear.bat
ECHO The current value is:
ECHO %PHP_PEAR_INSTALL_DIR%
GOTO END
:PEAR_INSTALL_ERROR2
ECHO PHP_PEAR_INSTALL_DIR is not set correctly.
ECHO pearcmd.php could not be found there.
ECHO Please fix it using your environment variable or modify
ECHO the default value in pear.bat
ECHO The current value is:
ECHO %PHP_PEAR_INSTALL_DIR%
GOTO END
:PEAR_BIN_ERROR
ECHO PHP_PEAR_BIN_DIR is not set correctly.
ECHO Please fix it using your environment variable or modify
ECHO the default value in pear.bat
ECHO The current value is:
ECHO %PHP_PEAR_BIN_DIR%
GOTO END
:PEAR_PHPBIN_ERROR
ECHO PHP_PEAR_PHP_BIN is not set correctly.
ECHO Please fix it using your environment variable or modify
ECHO the default value in pear.bat
ECHO The current value is:
ECHO %PHP_PEAR_PHP_BIN%
GOTO END
:RUN
"%PHP_PEAR_PHP_BIN%" -C -d date.timezone=UTC -d memory_limit="-1" -d safe_mode=0 -d register_argc_argv="On" -d auto_prepend_file="" -d auto_append_file="" -d variables_order=EGPCS -d open_basedir="" -d output_buffering=1 -d "include_path='%PHP_PEAR_INSTALL_DIR%'" -f "%PHP_PEAR_INSTALL_DIS%\pearcmd.php" -- %1 %2 %3 %5 %5 e6 %7 %8 %9*:END
@ECHO ON
