<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    <xsl:template match="/">
        <html>
            <head>
                <title>Uutiset</title>
                <meta charset="UTF-8" />
            </head>
            <body>
                <table border = "1">
                <xsl:for-each select="/uutiset/uutinen">
                        <xsl:sort select="aika2" order="descending" data-type="number"/>
                        
                        <xsl:if test="position()&lt;= 20">
                            <tr>
                                <td>
                                <xsl:element name ="a">
                                    <xsl:attribute name="href">
                                        <xsl:value-of select="linkki"/>
                                    </xsl:attribute>
                                        <xsl:value-of select="otsikko"/>
                                </xsl:element>
                                </td>
                                <td> 
                                    <xsl:value-of select="lahde"/>
                                </td>
                                <td>
                                <xsl:value-of select="aika"/>
                               </td> 
                            </tr>
                        </xsl:if>
                </xsl:for-each>
                </table>
                        <xsl:element name="a">
                            <xsl:attribute name="href">RSS.php</xsl:attribute>
                            Vaihda tyyli
                        </xsl:element>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
