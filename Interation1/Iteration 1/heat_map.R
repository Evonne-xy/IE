
library(lubridate)
library(ggplot2)
library(dplyr)
library(rlang)
library(data.table)
library(ggrepel)
library(tidyverse)
require(mapboxapi)
library(leaflet)
Sys.setenv('MAPBOX_TOKEN' = 'sk.eyJ1IjoieWFzaDA3MDE5NCIsImEiOiJja210NWtkNWwwb2F2Mm9sbTFkZW92MjExIn0.svjibK30Crxr1FhRR2i3zQ')

data_accidents = read_csv('crash_data_clean.csv')
pbn <- read.csv('D:/Sem 4/Industry Experience/R script/Principal_Bicycle_Network_(PBN).csv')
trail_names <- as.list(unique(pbn$name))
for (item in trail_names){
  list_trail = list()
  c(list_trail,paste(c(item,'Victoria',sep=' ')))
}
trail_names <- as.list(trail_names)

lsit_trail = list()
for (i in 1:length(trail_names)){
  if (is_empty(trail_names[[i]])){
    print (i)
  }
}
list_1 = list()
for (i in trail_names){
  if (grepl("^\\s*$", i) == FALSE){
    list_1 <- c(list_1,i)
  }}

for (i in 1:length(list_1)){
  list_trail[[i]] <- paste(c(list_1[[i]],'Victoria'),sep = ' ',collapse = ' ')
}

library(leaflet)
library(leaflet.extras)
library(magrittr)
coord_list <- list()

dist_list = list()



leaflet(data = df_1) %>% addTiles() %>%
  addMarkers(df_1[,1], df_1[,2])

ui <- fluidPage(
  dashboardPage( skin = "blue",
                 dashboardHeader(title = "U.S. Health Insurance",
                                 titleWidth = 450),
                 dashboardSidebar(
                   sidebarMenu(
                     menuItem("Overview", tabName = "overview", icon = icon("map"))
                   )
                 ),
                 dashboardBody(
                   tabItems(
                     tabItem("overview", 
                             fluidRow(
                               box(width = 12,reactive(textInput("location","Location","Clayton Victoria"))), 
                               box(width = 12,h4(tags$b("Enter your locations"))),
                               box(width = 12,leafletOutput("Plot",height = "600px")),
                               
                               box(width = 6,height = "150px",h4("Selected State"),
                                   h3(tags$b(span(textOutput("sel_state_name")),style = "color : #32cd32"))),
                               box(width = 6,height = "150px",span(h4("Number of Carriers,      Average Monthly Premium ,     Average Monthly Premium (consumption of tobacco)"),tags$b(tableOutput("table"))),style = "color : black"),
                               box(width = 12, h4(tags$b("Click on a state to futher investigate how plan rates vary by age and coverage level between smokers(pink) 
                                                         and non smokers(blue). Hover over the barchart to see the exact rate values"))),
                               box(width = 6,plotlyOutput("figure")),
                               box(width = 6,plotlyOutput("figure1"))))
                     
                   )
                 ))
)

#SERVER
server <- function(input, output){
  for (item in list_trail){
    my_route <- mb_directions(
      origin = 'Clayton Victoria',
      destination = item,
      profile = "cycling",
      steps = TRUE,
      language = "en"
    )
    my_route_dist <- list()
    my_route_disttotal<- Reduce("+",my_route$distance)

    dist_list <- c(dist_list,my_route_disttotal)

  }
  sorted_dist <- head(sort(unlist(dist_list),decreasing = FALSE))
  final_list = list()
  for (i in 1:3){
    a <- (which(dist_list == sorted_dist[i]))
    final_list <- c(final_list,list_trail[a])
  }
  final_list <- unique(final_list)
  coord_list <- list()
  for (i in 1:length(final_list)){
    coord_list[[i]] <- mb_geocode(final_list[[i]])
  }
  for (i in final_list){
    
  }

  my_route1 <- mb_directions(
    origin ='Clayton Victoria',
    destination = unlist(final_list[1]),
    profile = "cycling",
    steps = TRUE,
    language = "en"
  )
  my_route2 <- mb_directions(
    origin = 'Clayton Victoria',
    destination = unlist(final_list[2]),
    profile = "cycling",
    steps = TRUE,
    language = "en"
  )
  my_route3 <- mb_directions(
    origin = 'Clayton Victoria',
    destination = unlist(final_list[3]),
    profile = "cycling",
    steps = TRUE,
    language = "en"
  )

  library(maps)
  df_1 <- data.frame(coord_list)
  df_1 <- t(df_1)

  
  output$Plot <- renderLeaflet({
    leaflet(data = df_1) %>% addTiles() %>%
      addMarkers(df_1[,1], df_1[,2])})}
  



shinyApp(ui = ui, server = server)
