// Replace with your own values
const searchClient = algoliasearch(
    'WCJ2DXV139',
    '4c03335bd2fdd03667cffa705c14ae70' // search only API key, not admin API key
  )
  
  const search = instantsearch({
    indexName: 'NAME',
    searchClient,
    routing: true,
  })
  
  search.addWidgets([
    instantsearch.widgets.configure({
      hitsPerPage: 2,
    }),
  ]) 
  search.addWidgets([
    instantsearch.widgets.searchBox({
      container: '#search-box',
      placeholder: 'Start your search Neo',
    }),
  ])
  
  search.addWidgets([
    instantsearch.widgets.hits({
      container: '#hits',
      templates: {
        item: document.getElementById('hit-template').innerHTML,
        empty: `We didn't find any results for the search <em>"{{query}}"</em>`,
      },
    })
  ])
  search.start()
  