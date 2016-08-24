[Setup]
UsePreviousLanguage=no
AppName={cm:LongGameName}
AppId={cm:GameName}
AppVerName={cm:GameName}
AppPublisher=Wild and Free
AppPublisherURL=http://wild.game.free.fr/
DefaultDirName={pf}\{cm:FranchiseName}\{cm:GameName}
DefaultGroupName={cm:LongGameName}
AllowNoIcons=yes
LicenseFile=
OutputDir=..
Compression=lzma
SolidCompression=yes

[Tasks]
Name: "desktopicon"; Description: "{cm:CreateDesktopIcon}"; GroupDescription: "{cm:AdditionalIcons}"; 

[Files]
Source: "..\..\Standalone\Wild.exe"; DestDir: "{app}"; DestName: "Wild.exe"
Source: "..\..\Standalone\Wild_Data\*"; DestDir: "{app}\Wild_Data" ; Flags: recursesubdirs createallsubdirs

[UninstallDelete]
Type: filesandordirs; Name: "{app}\Wild.exe"
Type: filesandordirs; Name: "{app}\Wild.ico"
Type: filesandordirs; Name: "{app}\Wild_Data\*"

