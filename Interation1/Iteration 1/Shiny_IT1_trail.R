library(shiny)
library(shinydashboard)
library(leaflet)
library(plotly)
library(tidyverse)
library(ggthemes)
library(htmltools)
library(lubridate)
library(ggplot2)
library(dplyr)
library(rlang)
library(data.table)
library(ggrepel)
#library(tidyverse)
require(mapboxapi)

library(maps)
library(leaflet.extras2)

#reading the wrangled dataset

#install.packages("readxl")       
library(readxl)
#data <- readxl::read_xls("recreation_data.xls"  )
data_trail <- read.csv("trail_coord.csv")
data_trail

data_sub <- read.csv("sub_trail.csv")
data_sub
ui <- fluidPage(
  #creating dashboard page
  dashboardPage(skin = "purple",
                #creating dashboard header              
                dashboardHeader(disable = TRUE),
                dashboardSidebar(disable = TRUE),
                
                #creating the dashboard body
                dashboardBody(
                  
                  fluidRow(box(title = h3("Select your listed suburb"), background = "teal", width = 20, selectInput("sel_year","", c(unique(data_sub$Suburb)))
                  )),
                  
                  
                  
                  
                  fluidRow(
                    box(title = h3("The three trails nearest to your selected suburb are"), background = "light-blue", status =  "info",
                        # A static infoBox
                        #infoBox("data_cause", 10 * 2, icon = shiny::icon("road")),
                        #infoBox("New Orders", 10 * 2, icon = icon("road")),
                        #infoBox("New Orders", 10 * 2, icon = icon("road")),
                        # Dynamic infoBoxes
                        fluidRow(infoBoxOutput("trail1", width = 4),
                                 infoBoxOutput("trail2", width = 4),
                                 infoBoxOutput("trail3", width = 4)),width = 100
                        #infoBoxOutput("trail2"), width = 100
                    )),
                  # fluidRow(
                  
                  # column(3,
                  #     radioButtons("button", h3("Select your trail"),
                  #               choices = list("Trail 1" = 1, "Trail 2" = 2,
                  #                               "Trail 3" = 3),selected = 1))),
                  
                  fluidRow(box(title = h3("Select your trail"), background = "teal", width = 20, selectInput("trail","", c(unique(data_trail$trail)))),
                           
                           box(leafletOutput("mapPlot", height = "500px"), width = 1000)
                           
                           
                           
                           
                           
                           
                  )
                  
                )))

#server
server <- (function(input, output){
  #leaflet plot  
  #trailn <- data_cause$trail_name
  
  output$mapPlot <- renderLeaflet({
    leaflet() %>% addProviderTiles(providers$CartoDB.Positron)%>% 
      setView(mean(data_cause()$long), mean(data_cause()$lat),zoom = 13) %>%
      addMapPane("ames_circles", zIndex = 420) %>% # shown below ames_circles
      addCircles(
        data = data_cause(), data_cause()$long, data_cause()$lat, radius = 0.5, popup = data_cause()$trail,color = "Green",
        options = pathOptions(pane = "ames_circles")) %>%
      
      addLegend("bottomright", colors= "Green", labels=unique(data_cause()$trail), title="TRAIL")
    
    #addPopups(lat = ~X2, lng = ~X1, content,
    #         options = popupOptions(closeButton = FALSE))
    #addCircleMarkers(~origin)
  })
  
  
  
  
  #reactive function for selecting year in the cause of accidents plot
  
  data_ca <- reactive({
    data_sub %>%
      filter(Suburb %in% input$sel_year)
  })
  
  
  
  data_cause <- reactive({
    data_trail %>%
      filter(trail %in% input$trail)
  })
  
  
  
  output$trail1 <- renderInfoBox({
    
    infoBox(title = "Trail 1",
            value = data_ca()$Trail[1], fill = TRUE, color = "blue", icon = icon('road'))
        #"Progress", value = data_cause, paste0(25 + input$count, "%"), icon = icon("list"),
        #color = "purple"
      
    })
    
    output$trail2 <- renderInfoBox({
      infoBox(title = "Trail 2",
              value = data_ca()$Trail[2], fill = TRUE, color= "teal" ,icon = icon('road'))
      #"Progress", value = data_cause, paste0(25 + input$count, "%"), icon = icon("list"),
      #color = "purple"
      
    })
    
    output$trail3 <- renderInfoBox({
      infoBox(title = "Trail 3",
              value = data_ca()$Trail[3], fill = TRUE, color = "purple", icon = icon('road'))
      #"Progress", value = data_cause, paste0(25 + input$count, "%"), icon = icon("list"),
      #color = "purple"
      
    })
    #monthPlot refers to plot in the time tab which shows accidents based on month and year
    
    
    
  })
#shinyApp implementation
shinyApp(ui = ui, server = server )

