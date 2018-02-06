\NeedsTeXFormat{LaTeX2e}
\ProvidesClass{tecweb}

\LoadClass[12pt]{article}
\RequirePackage{makeidx}
\RequirePackage{geometry}
\RequirePackage[utf8]{inputenc}
\RequirePackage[italian]{babel}
\RequirePackage{xkeyval}
\RequirePackage{graphicx}
\RequirePackage{url}
\RequirePackage{fancyhdr}
\RequirePackage{lastpage}
\RequirePackage{verbatim}
\RequirePackage{float}
\RequirePackage{tabularx}
\RequirePackage{array}
\RequirePackage{ltablex}
\RequirePackage{multirow}
\RequirePackage{booktabs}
\RequirePackage[table,xcdraw]{xcolor}
\RequirePackage{setspace}
\RequirePackage{longtable}
\RequirePackage[shortlabels]{enumitem}
\RequirePackage{eurosym}
\RequirePackage{footnote}
\RequirePackage{adjustbox} 
\RequirePackage[colorlinks=true,linkcolor=black,urlcolor=blue]{hyperref}

\graphicspath{{img/}}

%Layout di pagina
\geometry{
	a4paper,
	total={160mm,225mm},
	left=25mm,
	top=25mm
}

%Intestazione e piè pagina
\pagestyle{fancy}
\fancyhf{}
\renewcommand{\headrulewidth}{0.4pt}
\renewcommand{\footrulewidth}{0.4pt}
\setlength\headheight{57pt}
\lhead{\includegraphics[width=2cm]{Logo2}}
\rhead{\nouppercase{\leftmark}}
\lfoot{\@title}
\rfoot{Pagina \thepage\ di \pageref{LastPage}}

\newcommand{\subsubsubsubsection}{\@startsection{subparagraph}{5}{\z@}%
	{-2.5ex\@plus -1ex \@minus -.25ex}%
	{1.25ex \@plus .25ex}%
	{\normalfont\normalsize\bfseries}}

\setcounter{secnumdepth}{5}
\setcounter{tocdepth}{5}