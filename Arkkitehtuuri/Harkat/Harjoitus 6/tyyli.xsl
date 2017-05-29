<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    <xsl:template match="/">
        <html>
            <head>
                <title>Fantsu Kunnat</title>
                <meta charset="UTF-8"/>
                <h1>Mikkelin tiedot</h1>
                
                <ul>
                    <li>
                        Mikkeli tietokannasta:
                        <xsl:value-of select="/kunnat/kunta[nimi = 'Mikkeli']"/>
                    </li>
                </ul>
                
            </head>
            <body>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
