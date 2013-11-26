@echo off

set fname=COMMIT_EDITMSG
set src=%~dp0.git\%fname%
set dst=%~dp0%fname%

echo copy %src% %dst% /Y
copy %src% %dst% /Y
echo Done