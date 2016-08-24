:loop
nant -buildfile:.\generate32.build -t:mono-3.5 -debug
goto :loop