/*
 * FCKeditor - The text editor for Internet - http://www.fckeditor.net
 * Copyright (C) 2003-2010 Frederico Caldeira Knabben
 *
 * == BEGIN LICENSE ==
 *
 * Licensed under the terms of any of the following licenses at your
 * choice:
 *
 *  - GNU General Public License Version 2 or later (the "GPL")
 *    http://www.gnu.org/licenses/gpl.html
 *
 *  - GNU Lesser General Public License Version 2.1 or later (the "LGPL")
 *    http://www.gnu.org/licenses/lgpl.html
 *
 *  - Mozilla Public License Version 1.1 or later (the "MPL")
 *    http://www.mozilla.org/MPL/MPL-1.1.html
 *
 * == END LICENSE ==
 *
 * Croatian language file.
 */

var FCKLang =
{
// Language direction : "ltr" (left to right) or "rtl" (right to left).
Dir					: "ltr",

ToolbarCollapse		: "Smanji trake s alatima",
ToolbarExpand		: "Pro�iri trake s alatima",

// Toolbar Items and Context Menu
Save				: "Snimi",
NewPage				: "Nova stranica",
Preview				: "Pregledaj",
Cut					: "Izre�i",
Copy				: "Kopiraj",
Paste				: "Zalijepi",
PasteText			: "Zalijepi kao cisti tekst",
PasteWord			: "Zalijepi iz Worda",
Print				: "Ispi�i",
SelectAll			: "Odaberi sve",
RemoveFormat		: "Ukloni formatiranje",
InsertLinkLbl		: "Link",
InsertLink			: "Ubaci/promijeni link",
RemoveLink			: "Ukloni link",
VisitLink			: "Otvori link",
Anchor				: "Ubaci/promijeni sidro",
AnchorDelete		: "Ukloni sidro",
InsertImageLbl		: "Slika",
InsertImage			: "Ubaci/promijeni sliku",
InsertFlashLbl		: "Flash",
InsertFlash			: "Ubaci/promijeni Flash",
InsertTableLbl		: "Tablica",
InsertTable			: "Ubaci/promijeni tablicu",
InsertLineLbl		: "Linija",
InsertLine			: "Ubaci vodoravnu liniju",
InsertSpecialCharLbl: "Posebni karakteri",
InsertSpecialChar	: "Ubaci posebne znakove",
InsertSmileyLbl		: "Smje�ko",
InsertSmiley		: "Ubaci smje�ka",
About				: "O FCKeditoru",
Bold				: "Podebljaj",
Italic				: "Ukosi",
Underline			: "Potcrtano",
StrikeThrough		: "Precrtano",
Subscript			: "Subscript",
Superscript			: "Superscript",
LeftJustify			: "Lijevo poravnanje",
CenterJustify		: "Sredi�nje poravnanje",
RightJustify		: "Desno poravnanje",
BlockJustify		: "Blok poravnanje",
DecreaseIndent		: "Pomakni ulijevo",
IncreaseIndent		: "Pomakni udesno",
Blockquote			: "Blockquote",
CreateDiv			: "Napravi Div kontejner",
EditDiv				: "Uredi Div kontejner",
DeleteDiv			: "Ukloni Div kontejner",
Undo				: "Poni�ti",
Redo				: "Ponovi",
NumberedListLbl		: "Brojcana lista",
NumberedList		: "Ubaci/ukloni brojcanu listu",
BulletedListLbl		: "Obicna lista",
BulletedList		: "Ubaci/ukloni obicnu listu",
ShowTableBorders	: "Prika�i okvir tablice",
ShowDetails			: "Prika�i detalje",
Style				: "Stil",
FontFormat			: "Format",
Font				: "Font",
FontSize			: "Velicina",
TextColor			: "Boja teksta",
BGColor				: "Boja pozadine",
Source				: "K�d",
Find				: "Pronadi",
Replace				: "Zamijeni",
SpellCheck			: "Provjeri pravopis",
UniversalKeyboard	: "Univerzalna tipkovnica",
PageBreakLbl		: "Prijelom stranice",
PageBreak			: "Ubaci prijelom stranice",

Form			: "Form",
Checkbox		: "Checkbox",
RadioButton		: "Radio Button",
TextField		: "Text Field",
Textarea		: "Textarea",
HiddenField		: "Hidden Field",
Button			: "Button",
SelectionField	: "Selection Field",
ImageButton		: "Image Button",

FitWindow		: "Povecaj velicinu editora",
ShowBlocks		: "Prika�i blokove",

// Context Menu
EditLink			: "Promijeni link",
CellCM				: "Celija",
RowCM				: "Red",
ColumnCM			: "Kolona",
InsertRowAfter		: "Ubaci red poslije",
InsertRowBefore		: "Ubaci red prije",
DeleteRows			: "Izbri�i redove",
InsertColumnAfter	: "Ubaci kolonu poslije",
InsertColumnBefore	: "Ubaci kolonu prije",
DeleteColumns		: "Izbri�i kolone",
InsertCellAfter		: "Ubaci celiju poslije",
InsertCellBefore	: "Ubaci celiju prije",
DeleteCells			: "Izbri�i celije",
MergeCells			: "Spoji celije",
MergeRight			: "Spoji desno",
MergeDown			: "Spoji dolje",
HorizontalSplitCell	: "Podijeli celiju vodoravno",
VerticalSplitCell	: "Podijeli celiju okomito",
TableDelete			: "Izbri�i tablicu",
CellProperties		: "Svojstva celije",
TableProperties		: "Svojstva tablice",
ImageProperties		: "Svojstva slike",
FlashProperties		: "Flash svojstva",

AnchorProp			: "Svojstva sidra",
ButtonProp			: "Image Button svojstva",
CheckboxProp		: "Checkbox svojstva",
HiddenFieldProp		: "Hidden Field svojstva",
RadioButtonProp		: "Radio Button svojstva",
ImageButtonProp		: "Image Button svojstva",
TextFieldProp		: "Text Field svojstva",
SelectionFieldProp	: "Selection svojstva",
TextareaProp		: "Textarea svojstva",
FormProp			: "Form svojstva",

FontFormats			: "Normal;Formatted;Address;Heading 1;Heading 2;Heading 3;Heading 4;Heading 5;Heading 6;Normal (DIV)",

// Alerts and Messages
ProcessingXHTML		: "Obradujem XHTML. Molimo pricekajte...",
Done				: "Zavr�io",
PasteWordConfirm	: "Tekst koji �elite zalijepiti cini se da je kopiran iz Worda. �elite li prije ocistiti tekst?",
NotCompatiblePaste	: "Ova naredba je dostupna samo u Internet Exploreru 5.5 ili novijem. �elite li nastaviti bez ci�cenja?",
UnknownToolbarItem	: "Nepoznati clan trake s alatima \"%1\"",
UnknownCommand		: "Nepoznata naredba \"%1\"",
NotImplemented		: "Naredba nije implementirana",
UnknownToolbarSet	: "Traka s alatima \"%1\" ne postoji",
NoActiveX			: "Va�e postavke pretra�ivaca mogle bi ograniciti neke od mogucnosti editora. Morate ukljuciti opciju \"Run ActiveX controls and plug-ins\" u postavkama. Ukoliko to ne ucinite, moguce su razliite gre�ke tijekom rada.",
BrowseServerBlocked : "Pretraivac nije moguce otvoriti. Provjerite da li je ukljuceno blokiranje pop-up prozora.",
DialogBlocked		: "Nije moguce otvoriti novi prozor. Provjerite da li je ukljuceno blokiranje pop-up prozora.",
VisitLinkBlocked	: "Nije moguce otvoriti novi prozor. Provjerite da li je ukljuceno blokiranje pop-up prozora.",

// Dialogs
DlgBtnOK			: "OK",
DlgBtnCancel		: "Poni�ti",
DlgBtnClose			: "Zatvori",
DlgBtnBrowseServer	: "Pretra�i server",
DlgAdvancedTag		: "Napredno",
DlgOpOther			: "<Drugo>",
DlgInfoTab			: "Info",
DlgAlertUrl			: "Molimo unesite URL",

// General Dialogs Labels
DlgGenNotSet		: "<nije postavljeno>",
DlgGenId			: "Id",
DlgGenLangDir		: "Smjer jezika",
DlgGenLangDirLtr	: "S lijeva na desno (LTR)",
DlgGenLangDirRtl	: "S desna na lijevo (RTL)",
DlgGenLangCode		: "K�d jezika",
DlgGenAccessKey		: "Pristupna tipka",
DlgGenName			: "Naziv",
DlgGenTabIndex		: "Tab Indeks",
DlgGenLongDescr		: "Dugacki opis URL",
DlgGenClass			: "Stylesheet klase",
DlgGenTitle			: "Advisory naslov",
DlgGenContType		: "Advisory vrsta sadr�aja",
DlgGenContRel		: "Relationtyp",
DlgGenLinkCharset	: "Kodna stranica povezanih resursa",
DlgGenStyle			: "Stil",

// Image Dialog
DlgImgTitle			: "Svojstva slika",
DlgImgInfoTab		: "Info slike",
DlgImgBtnUpload		: "Po�alji na server",
DlgImgURL			: "URL",
DlgImgUpload		: "Po�alji",
DlgImgAlt			: "Alternativni tekst",
DlgImgWidth			: "�irina",
DlgImgHeight		: "Visina",
DlgImgLockRatio		: "Zakljucaj odnos",
DlgBtnResetSize		: "Obri�i velicinu",
DlgImgBorder		: "Okvir",
DlgImgHSpace		: "HSpace",
DlgImgVSpace		: "VSpace",
DlgImgAlign			: "Poravnaj",
DlgImgAlignLeft		: "Lijevo",
DlgImgAlignAbsBottom: "Abs dolje",
DlgImgAlignAbsMiddle: "Abs sredina",
DlgImgAlignBaseline	: "Bazno",
DlgImgAlignBottom	: "Dolje",
DlgImgAlignMiddle	: "Sredina",
DlgImgAlignRight	: "Desno",
DlgImgAlignTextTop	: "Vrh teksta",
DlgImgAlignTop		: "Vrh",
DlgImgPreview		: "Pregledaj",
DlgImgAlertUrl		: "Unesite URL slike",
DlgImgLinkTab		: "Link",

// Flash Dialog
DlgFlashTitle		: "Flash svojstva",
DlgFlashChkPlay		: "Auto Play",
DlgFlashChkLoop		: "Ponavljaj",
DlgFlashChkMenu		: "Omoguci Flash izbornik",
DlgFlashScale		: "Omjer",
DlgFlashScaleAll	: "Prika�i sve",
DlgFlashScaleNoBorder	: "Bez okvira",
DlgFlashScaleFit	: "Tocna velicina",

// Link Dialog
DlgLnkWindowTitle	: "Link",
DlgLnkInfoTab		: "Link Info",
DlgLnkTargetTab		: "Meta",

DlgLnkType			: "Link vrsta",
DlgLnkTypeURL		: "URL",
DlgLnkTypeAnchor	: "Sidro na ovoj stranici",
DlgLnkTypeEMail		: "E-Mail",
DlgLnkProto			: "Protokol",
DlgLnkProtoOther	: "<drugo>",
DlgLnkURL			: "URL",
DlgLnkAnchorSel		: "Odaberi sidro",
DlgLnkAnchorByName	: "Po nazivu sidra",
DlgLnkAnchorById	: "Po Id elementa",
DlgLnkNoAnchors		: "(Nema dostupnih sidra)",
DlgLnkEMail			: "E-Mail adresa",
DlgLnkEMailSubject	: "Naslov",
DlgLnkEMailBody		: "Sadr�aj poruke",
DlgLnkUpload		: "Po�alji",
DlgLnkBtnUpload		: "Po�alji na server",

DlgLnkTarget		: "Meta",
DlgLnkTargetFrame	: "<okvir>",
DlgLnkTargetPopup	: "<popup prozor>",
DlgLnkTargetBlank	: "Novi prozor (_blank)",
DlgLnkTargetParent	: "Roditeljski prozor (_parent)",
DlgLnkTargetSelf	: "Isti prozor (_self)",
DlgLnkTargetTop		: "Vr�ni prozor (_top)",
DlgLnkTargetFrameName	: "Ime ciljnog okvira",
DlgLnkPopWinName	: "Naziv popup prozora",
DlgLnkPopWinFeat	: "Mogucnosti popup prozora",
DlgLnkPopResize		: "Promjenljive velicine",
DlgLnkPopLocation	: "Traka za lokaciju",
DlgLnkPopMenu		: "Izborna traka",
DlgLnkPopScroll		: "Scroll traka",
DlgLnkPopStatus		: "Statusna traka",
DlgLnkPopToolbar	: "Traka s alatima",
DlgLnkPopFullScrn	: "Cijeli ekran (IE)",
DlgLnkPopDependent	: "Ovisno (Netscape)",
DlgLnkPopWidth		: "�irina",
DlgLnkPopHeight		: "Visina",
DlgLnkPopLeft		: "Lijeva pozicija",
DlgLnkPopTop		: "Gornja pozicija",

DlnLnkMsgNoUrl		: "Molimo upi�ite URL link",
DlnLnkMsgNoEMail	: "Molimo upi�ite e-mail adresu",
DlnLnkMsgNoAnchor	: "Molimo odaberite sidro",
DlnLnkMsgInvPopName	: "Ime popup prozora mora poceti sa slovom i ne smije sadr�avati razmake",

// Color Dialog
DlgColorTitle		: "Odaberite boju",
DlgColorBtnClear	: "Obri�i",
DlgColorHighlight	: "Osvijetli",
DlgColorSelected	: "Odaberi",

// Smiley Dialog
DlgSmileyTitle		: "Ubaci smje�ka",

// Special Character Dialog
DlgSpecialCharTitle	: "Odaberite posebni karakter",

// Table Dialog
DlgTableTitle		: "Svojstva tablice",
DlgTableRows		: "Redova",
DlgTableColumns		: "Kolona",
DlgTableBorder		: "Velicina okvira",
DlgTableAlign		: "Poravnanje",
DlgTableAlignNotSet	: "<nije postavljeno>",
DlgTableAlignLeft	: "Lijevo",
DlgTableAlignCenter	: "Sredi�nje",
DlgTableAlignRight	: "Desno",
DlgTableWidth		: "�irina",
DlgTableWidthPx		: "piksela",
DlgTableWidthPc		: "postotaka",
DlgTableHeight		: "Visina",
DlgTableCellSpace	: "Prostornost celija",
DlgTableCellPad		: "Razmak celija",
DlgTableCaption		: "Naslov",
DlgTableSummary		: "Sa�etak",
DlgTableHeaders		: "Headers",	//MISSING
DlgTableHeadersNone		: "None",	//MISSING
DlgTableHeadersColumn	: "First column",	//MISSING
DlgTableHeadersRow		: "First Row",	//MISSING
DlgTableHeadersBoth		: "Both",	//MISSING

// Table Cell Dialog
DlgCellTitle		: "Svojstva celije",
DlgCellWidth		: "�irina",
DlgCellWidthPx		: "piksela",
DlgCellWidthPc		: "postotaka",
DlgCellHeight		: "Visina",
DlgCellWordWrap		: "Word Wrap",
DlgCellWordWrapNotSet	: "<nije postavljeno>",
DlgCellWordWrapYes	: "Da",
DlgCellWordWrapNo	: "Ne",
DlgCellHorAlign		: "Vodoravno poravnanje",
DlgCellHorAlignNotSet	: "<nije postavljeno>",
DlgCellHorAlignLeft	: "Lijevo",
DlgCellHorAlignCenter	: "Sredi�nje",
DlgCellHorAlignRight: "Desno",
DlgCellVerAlign		: "Okomito poravnanje",
DlgCellVerAlignNotSet	: "<nije postavljeno>",
DlgCellVerAlignTop	: "Gornje",
DlgCellVerAlignMiddle	: "Sredni�nje",
DlgCellVerAlignBottom	: "Donje",
DlgCellVerAlignBaseline	: "Bazno",
DlgCellType		: "Cell Type",	//MISSING
DlgCellTypeData		: "Data",	//MISSING
DlgCellTypeHeader	: "Header",	//MISSING
DlgCellRowSpan		: "Spajanje redova",
DlgCellCollSpan		: "Spajanje kolona",
DlgCellBackColor	: "Boja pozadine",
DlgCellBorderColor	: "Boja okvira",
DlgCellBtnSelect	: "Odaberi...",

// Find and Replace Dialog
DlgFindAndReplaceTitle	: "Pronadi i zamijeni",

// Find Dialog
DlgFindTitle		: "Pronadi",
DlgFindFindBtn		: "Pronadi",
DlgFindNotFoundMsg	: "Tra�eni tekst nije pronaden.",

// Replace Dialog
DlgReplaceTitle			: "Zamijeni",
DlgReplaceFindLbl		: "Pronadi:",
DlgReplaceReplaceLbl	: "Zamijeni s:",
DlgReplaceCaseChk		: "Usporedi mala/velika slova",
DlgReplaceReplaceBtn	: "Zamijeni",
DlgReplaceReplAllBtn	: "Zamijeni sve",
DlgReplaceWordChk		: "Usporedi cijele rijeci",

// Paste Operations / Dialog
PasteErrorCut	: "Sigurnosne postavke Va�eg pretra�ivaca ne dozvoljavaju operacije automatskog izrezivanja. Molimo koristite kraticu na tipkovnici (Ctrl+X).",
PasteErrorCopy	: "Sigurnosne postavke Va�eg pretra�ivaca ne dozvoljavaju operacije automatskog kopiranja. Molimo koristite kraticu na tipkovnici (Ctrl+C).",

PasteAsText		: "Zalijepi kao cisti tekst",
PasteFromWord	: "Zalijepi iz Worda",

DlgPasteMsg2	: "Molimo zaljepite unutar doljnjeg okvira koristeci tipkovnicu (<STRONG>Ctrl+V</STRONG>) i kliknite <STRONG>OK</STRONG>.",
DlgPasteSec		: "Zbog sigurnosnih postavki Va�eg pretra�ivaca, editor nema direktan pristup Va�em meduspremniku. Potrebno je ponovno zalijepiti tekst u ovaj prozor.",
DlgPasteIgnoreFont		: "Zanemari definiciju vrste fonta",
DlgPasteRemoveStyles	: "Ukloni definicije stilova",

// Color Picker
ColorAutomatic	: "Automatski",
ColorMoreColors	: "Vi�e boja...",

// Document Properties
DocProps		: "Svojstva dokumenta",

// Anchor Dialog
DlgAnchorTitle		: "Svojstva sidra",
DlgAnchorName		: "Ime sidra",
DlgAnchorErrorName	: "Molimo unesite ime sidra",

// Speller Pages Dialog
DlgSpellNotInDic		: "Nije u rjecniku",
DlgSpellChangeTo		: "Promijeni u",
DlgSpellBtnIgnore		: "Zanemari",
DlgSpellBtnIgnoreAll	: "Zanemari sve",
DlgSpellBtnReplace		: "Zamijeni",
DlgSpellBtnReplaceAll	: "Zamijeni sve",
DlgSpellBtnUndo			: "Vrati",
DlgSpellNoSuggestions	: "-Nema preporuke-",
DlgSpellProgress		: "Provjera u tijeku...",
DlgSpellNoMispell		: "Provjera zavr�ena: Nema gre�aka",
DlgSpellNoChanges		: "Provjera zavr�ena: Nije napravljena promjena",
DlgSpellOneChange		: "Provjera zavr�ena: Jedna rijec promjenjena",
DlgSpellManyChanges		: "Provjera zavr�ena: Promijenjeno %1 rijeci",

IeSpellDownload			: "Provjera pravopisa nije instalirana. �elite li skinuti provjeru pravopisa?",

// Button Dialog
DlgButtonText		: "Tekst (vrijednost)",
DlgButtonType		: "Vrsta",
DlgButtonTypeBtn	: "Gumb",
DlgButtonTypeSbm	: "Po�alji",
DlgButtonTypeRst	: "Poni�ti",

// Checkbox and Radio Button Dialogs
DlgCheckboxName		: "Ime",
DlgCheckboxValue	: "Vrijednost",
DlgCheckboxSelected	: "Odabrano",

// Form Dialog
DlgFormName		: "Ime",
DlgFormAction	: "Akcija",
DlgFormMethod	: "Metoda",

// Select Field Dialog
DlgSelectName		: "Ime",
DlgSelectValue		: "Vrijednost",
DlgSelectSize		: "Velicina",
DlgSelectLines		: "linija",
DlgSelectChkMulti	: "Dozvoli vi�estruki odabir",
DlgSelectOpAvail	: "Dostupne opcije",
DlgSelectOpText		: "Tekst",
DlgSelectOpValue	: "Vrijednost",
DlgSelectBtnAdd		: "Dodaj",
DlgSelectBtnModify	: "Promijeni",
DlgSelectBtnUp		: "Gore",
DlgSelectBtnDown	: "Dolje",
DlgSelectBtnSetValue : "Postavi kao odabranu vrijednost",
DlgSelectBtnDelete	: "Obri�i",

// Textarea Dialog
DlgTextareaName	: "Ime",
DlgTextareaCols	: "Kolona",
DlgTextareaRows	: "Redova",

// Text Field Dialog
DlgTextName			: "Ime",
DlgTextValue		: "Vrijednost",
DlgTextCharWidth	: "�irina",
DlgTextMaxChars		: "Najvi�e karaktera",
DlgTextType			: "Vrsta",
DlgTextTypeText		: "Tekst",
DlgTextTypePass		: "�ifra",

// Hidden Field Dialog
DlgHiddenName	: "Ime",
DlgHiddenValue	: "Vrijednost",

// Bulleted List Dialog
BulletedListProp	: "Svojstva liste",
NumberedListProp	: "Svojstva brojcane liste",
DlgLstStart			: "Pocetak",
DlgLstType			: "Vrsta",
DlgLstTypeCircle	: "Krug",
DlgLstTypeDisc		: "Disk",
DlgLstTypeSquare	: "Kvadrat",
DlgLstTypeNumbers	: "Brojevi (1, 2, 3)",
DlgLstTypeLCase		: "Mala slova (a, b, c)",
DlgLstTypeUCase		: "Velika slova (A, B, C)",
DlgLstTypeSRoman	: "Male rimske brojke (i, ii, iii)",
DlgLstTypeLRoman	: "Velike rimske brojke (I, II, III)",

// Document Properties Dialog
DlgDocGeneralTab	: "Opcenito",
DlgDocBackTab		: "Pozadina",
DlgDocColorsTab		: "Boje i margine",
DlgDocMetaTab		: "Meta Data",

DlgDocPageTitle		: "Naslov stranice",
DlgDocLangDir		: "Smjer jezika",
DlgDocLangDirLTR	: "S lijeva na desno",
DlgDocLangDirRTL	: "S desna na lijevo",
DlgDocLangCode		: "K�d jezika",
DlgDocCharSet		: "Enkodiranje znakova",
DlgDocCharSetCE		: "Sredi�nja Europa",
DlgDocCharSetCT		: "Tradicionalna kineska (Big5)",
DlgDocCharSetCR		: "Cirilica",
DlgDocCharSetGR		: "Grcka",
DlgDocCharSetJP		: "Japanska",
DlgDocCharSetKR		: "Koreanska",
DlgDocCharSetTR		: "Turska",
DlgDocCharSetUN		: "Unicode (UTF-8)",
DlgDocCharSetWE		: "Zapadna Europa",
DlgDocCharSetOther	: "Ostalo enkodiranje znakova",

DlgDocDocType		: "Zaglavlje vrste dokumenta",
DlgDocDocTypeOther	: "Ostalo zaglavlje vrste dokumenta",
DlgDocIncXHTML		: "Ubaci XHTML deklaracije",
DlgDocBgColor		: "Boja pozadine",
DlgDocBgImage		: "URL slike pozadine",
DlgDocBgNoScroll	: "Pozadine se ne pomice",
DlgDocCText			: "Tekst",
DlgDocCLink			: "Link",
DlgDocCVisited		: "Posjeceni link",
DlgDocCActive		: "Aktivni link",
DlgDocMargins		: "Margine stranice",
DlgDocMaTop			: "Vrh",
DlgDocMaLeft		: "Lijevo",
DlgDocMaRight		: "Desno",
DlgDocMaBottom		: "Dolje",
DlgDocMeIndex		: "Kljucne rijeci dokumenta (odvojene zarezom)",
DlgDocMeDescr		: "Opis dokumenta",
DlgDocMeAuthor		: "Autor",
DlgDocMeCopy		: "Autorska prava",
DlgDocPreview		: "Pregledaj",

// Templates Dialog
Templates			: "Predlo�ci",
DlgTemplatesTitle	: "Predlo�ci sadr�aja",
DlgTemplatesSelMsg	: "Molimo odaberite predlo�ak koji �elite otvoriti<br>(stvarni sadr�aj ce biti izgubljen):",
DlgTemplatesLoading	: "Ucitavam listu predlo�aka. Molimo pricekajte...",
DlgTemplatesNoTpl	: "(Nema definiranih predlo�aka)",
DlgTemplatesReplace	: "Zamijeni trenutne sadr�aje",

// About Dialog
DlgAboutAboutTab	: "O FCKEditoru",
DlgAboutBrowserInfoTab	: "Podaci o pretra�ivacu",
DlgAboutLicenseTab	: "Licenca",
DlgAboutVersion		: "inacica",
DlgAboutInfo		: "Za vi�e informacija posjetite",
DlgAboutModule		: "Developed for WebsiteBaker<br />modul version ",

// Div Dialog
DlgDivGeneralTab	: "Opcenito",
DlgDivAdvancedTab	: "Napredno",
DlgDivStyle		: "Stil",
DlgDivInlineStyle	: "Stil u redu",

ScaytTitle			: "SCAYT",	//MISSING
ScaytTitleOptions	: "Options",	//MISSING
ScaytTitleLangs		: "Languages",	//MISSING
ScaytTitleAbout		: "About"	//MISSING
};
