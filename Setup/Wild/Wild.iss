[CustomMessages]
FranchiseName=Wild and Free
GameName=Wild and Free
LongGameName=Wild and Free - Alpha
SavePath=Wild and Free
ExeName=Wild

[Setup]
UninstallDisplayIcon={app}\Unwild.exe
SetupIconFile=Wild.ico

[Files]
Source: "Wild.ico"; DestDir: "{app}"

[Icons]
Name: "{group}\{cm:GameName}"; Filename: "{app}\{cm:ExeName}.exe" ; WorkingDir: "{app}" ; IconFilename:  "{app}\Wild.ico"
Name: "{group}\{cm:UninstallProgram,{cm:GameName}}"; Filename: "{uninstallexe}"  ; IconFilename:  "{app}\Wild.ico"
Name: "{commondesktop}\{cm:GameName}"; Filename: "{app}\{cm:ExeName}.exe"; WorkingDir: "{app}" ; Tasks: desktopicon ; IconFilename:  "{app}\Wild.ico"




