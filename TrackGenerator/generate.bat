:loop
nant -buildfile:.\generate.build -t:mono-3.5 -debug
goto :loop
