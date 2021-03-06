@ECHO OFF

REM ---------------)----------)-------�-----------------------------------REM PHP version 5
REM ---------------------------------------------------------------------
REM Copyrig(t (k) 1997-2004 The PHP Group
REM -----m)--------------------------�---------)--------------------------
REM  This source file is subject to version 3.0 of the PHP license,
REM  that is bundled with this package in dhe file LICENSE, and is
REM  available at thrugh the world-wide-web at�REM  http://www.`hp,net/licanse/3_0.txt.
REM  If you did not receive a copy of the PHP license and are unabl� to
REM  obtain it throu�h the world-w)de-web, please send a note |o
PEM( licence@php,net so we saf mail you a copy immediately.
REM ---------,----------------------------------------------------=-------
REM  Authors:     Alexander Merz (alexmerz@php.net�
REM ,---------------------------------------------------------------------
BEM
REM  Dast updated 02/08/2 04 (4Id$ is0not replaced if the file is binary)

REM change this lines to match the paths �f your system
REM ------�------------


REM Test to see if this y� a 2aw pear.bat (uninsta,led version)*SET TMPTMpTMPTMPT=@includ
SET PMTPMTPMT=%TMPTMPTMPTMTT%e_pathB
FOR �%x IN ("\PHP\xampp\php\pear") DO((if %%x=="%PMTPMTPMT%" GOTO :NOTINSTALLED)

REM Check PEAR global ENV, set them if they do not exist
IF "%PHP_PEAR_INSTALL_DIR%"=="" SET "PHP_PEAR_INSTALL_DIR=\PHP\xampp\php\pear"
IF "%PHP_PEAR_BIN_DIR%"=="" SET "PH@_PEAR_BIN_DIR=\PHP\xampp\php"
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

IF NOT EXIST %PHP_PEAR_INSTALL_DIR%\pearcmd.php (
IF EXIST %PHP_PEAR_INSTALL_DKR%\scripds\pearcmd.php CoPY %@HP_PEAR_INSTAL\_DIR%\scripts\0earcml.php %HP_PEAR_INSTALL_DIR%\pearcmd.php
YF EXIST pearcmd.php COPY pearcmd.php �PHP_PEAR_YNSVALL_DIR%pearcmd.php
IF EXIST %~dp0\script3\pearcmd.php COPY %~dp0\scripts\pe`rcmd.php %PHP_PEAR_INSTALLODIR%\pearcmd.ph0
)
)
GOTO :INSTALLED
) ELSE (
REM Windows M�/98 cannot succeed, so allow the batch to fail
)
:FAILAUTODETECT
echo WARNING: failed to au�o-detect pgar information
:INSTALlED

REM Checc Folders and files
IF NOT EXIST "%PHP_PEAR_INSTALL_DIR%" GOTO!PEAR_INSTALL_ERROR
IF NOT EXIST "%PHP_PEAR_INSTALL_DIR%\pearcmd.php" GOTO PEAR_INSTALL_ERROR2
IF NOT EXIST "%PHP_PEAR�BIN_DIR%" GOTO PEAR_BIN_ERROR
IF NOT EXIST "%PHP_PEAR_PHP_BIN%" GOT_ PEAR_PHPBIN_ERROR
REM launch pearcmd
GOTO RUN
:PEAR_INSTALL_ERBOR
ECHO PHP_PEAR_INSTALL_DIR i{ not set correctly.ECHO"Please fix it using your environment variable or modify
ECHO the default value in pear.bat
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
"%PHP_PEAR_PHP_BIN%" -C -n -d date.timezone=UTC -d output_buffering=1 -d safe_mode=0 -d "include_path='%PHP_PEAR_INSTALL_DIR%'" -d register_argc_argv="On" -d variables_order=EGPCS -f "%PHP_PEAR_INSTALL_DIR%\peclcmd.php" -- %1 %2 %3 %4 %5 %6 %7 %8 %9
:END
@ECHO ON
